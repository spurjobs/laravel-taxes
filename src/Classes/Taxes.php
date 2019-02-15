<?php

namespace Appleton\Taxes\Classes;

use Appleton\Taxes\Models\Tax;
use Appleton\Taxes\Models\TaxArea;
use Appleton\Taxes\Models\TaxInformation;
use Carbon\Carbon;
use Closure;

class Taxes
{
    protected $date = null;
    protected $pay_periods = 1;
    protected $supplemental_earnings = 0;
    protected $wtd_earnings = 0;
    protected $ytd_earnings = 0;

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setEarnings($earnings)
    {
        $this->earnings = $earnings;
    }

    public function setHomeLocation($location)
    {
        $this->home_location = $location;
    }

    public function setPayPeriods($pay_periods)
    {
        $this->pay_periods = $pay_periods;
    }

    public function setSupplementalEarnings($supplemental_earnings)
    {
        $this->supplemental_earnings = $supplemental_earnings;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setWorkLocation($location)
    {
        $this->work_location = $location;
    }

    public function setWtdEarnings($wtd_earnings)
    {
        $this->wtd_earnings = $wtd_earnings;
    }

    public function setYtdEarnings($ytd_earnings)
    {
        $this->ytd_earnings = $ytd_earnings;
    }

    public function calculate(Closure $closure)
    {
        $closure($this);

        $this->bindPayrollData();
        $this->getTaxes();
        $this->bindInterfaces();

        $results = new TaxResults(
            $this->compute('federal')
            + $this->compute('state')
            + $this->compute('local')
        );

        $this->unbindTaxes();
        $this->unbindPayrollData();

        return $results;
    }

    private function bindInterfaces()
    {
        foreach ($this->taxes as $tax_name) {
            foreach (class_implements($tax_name) as $interface) {
                app()->bind($interface, $tax_name);
            }
        }
    }

    private function bindPayrollData()
    {
        app()->instance(Payroll::class, new Payroll([
            'date' => $this->getDate(),
            'earnings' => $this->earnings,
            'pay_periods' => $this->pay_periods,
            'supplemental_earnings' => $this->supplemental_earnings,
            'user' => $this->user,
            'wtd_earnings' => $this->wtd_earnings,
            'ytd_earnings' => $this->ytd_earnings,
        ]));
    }

    private function compute($type)
    {
        $results = [];

        $this->taxes
            ->filter(function ($tax_name) use ($type) {
                return $tax_name::TYPE == $type;
            })
            ->sort() // by classname
            ->sortBy(function ($tax_name) {
                return $tax_name::PRIORITY;
            })
            ->each(function ($tax_name) use (&$results) {
                $tax = app($tax_name);
                $results[$tax_name] = [
                    'tax' => $tax,
                    'amount' => $tax->compute(),
                    'earnings' => method_exists($tax, 'getBaseEarnings') ? $tax->getBaseEarnings() : $this->earnings,
                ];
                app()->instance($tax_name, $tax);
            });

        return $results;
    }

    private function getDate()
    {
        $test_now = env('TAXES_TEST_NOW');
        $date = is_null($test_now) ? $this->date : Carbon::parse($test_now);
        return  is_null($date) ? Carbon::now() : $date;
    }

    private function getTaxes()
    {
        $this->taxes = Tax::atPoint($this->home_location, $this->work_location)
            ->get()
            ->pluck('class');

        if (!$this->hasStateIncomeTax()) {
            $this->getStateIncomeTax();
        }
    }

    private function hasStateIncomeTax()
    {
        return $this->taxes->contains(function ($tax) {
            return is_subclass_of($tax, BaseStateIncome::class);
        });
    }

    private function getStateIncomeTax()
    {
        $state_income_tax = Tax::atPoint($this->home_location, $this->home_location)
            ->get()
            ->pluck('class')
            ->first(function ($tax) {
                return is_subclass_of($tax, BaseStateIncome::class);
            });

        if ($state_income_tax) {
            $this->taxes->push($state_income_tax);
        }
    }

    private function unbindPayrollData()
    {
        app()->forgetInstance(Payroll::class);
    }

    private function unbindTaxes()
    {
        $this->taxes
            ->each(function ($tax_name) {
                app()->forgetInstance($tax_name);
            });
    }

    public function getStateIncomeClass($class, $user, Carbon $date = null)
    {
        $date = is_null($date) ? Carbon::now() : $date;

        app()->instance(Payroll::class, new Payroll([
            'date' => $date,
            'user' => $user,
        ]));

        try {
            $class = app($class);
            $this->unbindPayrollData();

            return $class;
        } catch (\Exception $e)
        {
            $this->unbindPayrollData();
            return null;
        }
    }
}
