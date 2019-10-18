<?php

namespace Appleton\Taxes\Classes\WorkerTaxes;

use Appleton\Taxes\Models\GovernmentalUnitArea;

class PayrollOld
{
    public $birth_date;
    public $date;
    public $days_worked;
    public $earnings;
    public $exemptions;
    public $pay_periods;
    public $supplemental_earnings;
    public $user;
    public $wtd_earnings;
    public $mtd_earnings;
    public $ytd_earnings;
    public $exempted_earnings;
    public $exempted_supplemental_earnings;

    protected $amount_withheld;

    public function __construct(array $parameters)
    {
        $this->birth_date = $parameters['birth_date'] ?? null;
        $this->date = $parameters['date'];
        $this->days_worked = $parameters['days_worked'] ?? false;
        $this->earnings = $parameters['earnings'] ?? 0;
        $this->exemptions = collect($parameters['exemptions'] ?? []);
        $this->pay_periods = $parameters['pay_periods'] ?? 52;
        $this->supplemental_earnings = $parameters['supplemental_earnings'] ?? 0;
        $this->user = $parameters['user'];
        $this->wtd_earnings = $parameters['wtd_earnings'] ?? 0;
        $this->mtd_earnings = $parameters['mtd_earnings'] ?? 0;
        $this->ytd_earnings = $parameters['ytd_earnings'] ?? 0;
        $this->exempted_earnings = $parameters['exempted_earnings'] ?? 0;
        $this->exempted_supplemental_earnings = $parameters['exempted_supplemental_earnings'] ?? 0;

        $this->amount_withheld = 0;
    }

    public function exemptEarnings(string $class_name)
    {
        if ($this->exemptions->has($class_name)) {
            $max_amount_exempt = $this->exemptions->get($class_name, 0);
        } else {
            $max_amount_exempt = $this->exemptions->first(function ($value, $key) use ($class_name) {
                return is_subclass_of($class_name, $key);
            }, 0);
        }
        $this->exempted_earnings = min($max_amount_exempt, $this->earnings);
        $this->exempted_supplemental_earnings = min($max_amount_exempt - $this->exempted_earnings, $this->supplemental_earnings);
        return $this;
    }

    public function withholdTax(?float $amount): ?float
    {
        $amount = min($this->getNetEarnings(), $amount);
        $this->amount_withheld += $amount;
        return $amount;
    }

    public function getNetEarnings():float
    {
        return max($this->getEarnings() - $this->amount_withheld, 0);
    }

    public function getEarnings():float
    {
        return $this->earnings - $this->exempted_earnings;
    }

    public function getSupplementalEarnings():float
    {
        return $this->supplemental_earnings - $this->exempted_supplemental_earnings;
    }

    public function getDaysWorked(string $tax_class, GovernmentalUnitArea $governmental_unit_area = null)
    {
        if (is_callable($this->days_worked)) {
            return ($this->days_worked)($tax_class,$governmental_unit_area);
        }

        return $this->days_worked;
    }

    public function getWtdEarnings(GovernmentalUnitArea $governmental_unit_area = null)
    {
        if (is_callable($this->wtd_earnings)) {
            return ($this->wtd_earnings)($governmental_unit_area);
        }

        return $this->wtd_earnings;
    }

    public function getMtdEarnings(GovernmentalUnitArea $governmental_unit_area = null)
    {
        if (is_callable($this->mtd_earnings)) {
            return ($this->mtd_earnings)($governmental_unit_area);
        }

        return $this->mtd_earnings;
    }

    public function getYtdEarnings(GovernmentalUnitArea $governmental_unit_area = null)
    {
        if (is_callable($this->ytd_earnings)) {
            return ($this->ytd_earnings)($governmental_unit_area);
        }

        return $this->ytd_earnings;
    }
}