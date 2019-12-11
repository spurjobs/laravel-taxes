<?php

namespace Appleton\Taxes\Tests\Unit\Countries;

use Appleton\Taxes\Classes\WorkerTaxes\GeoPoint;
use Appleton\Taxes\Classes\WorkerTaxes\Taxes;
use Appleton\Taxes\Classes\WorkerTaxes\TaxesQueryRunner;
use Appleton\Taxes\Classes\WorkerTaxes\TaxOverrideManager;
use Appleton\Taxes\Classes\WorkerTaxes\TaxResult;
use Appleton\Taxes\Tests\Unit\UnitTestCase;
use Carbon\Carbon;
use ReflectionClass;

/**
 * @property Taxes taxes
 */
abstract class TaxTestCase extends UnitTestCase
{
    protected $query_runner;
    protected $taxes;

    public function setUp(): void
    {
        parent::setUp();

        $this->query_runner = new TestTaxesQueryRunner();
        $this->app->instance(TaxesQueryRunner::class, $this->query_runner);
        $this->app->instance(TaxOverrideManager::class, new TaxOverrideManager($this->query_runner));
        $this->taxes = app(Taxes::class);
    }

    protected function disableTestQueryRunner(): void
    {
        $this->app->forgetInstance(TaxesQueryRunner::class);
        $this->app->forgetInstance(TaxOverrideManager::class);
        $this->taxes = app(Taxes::class);
    }

    protected function validate(TestParameters $parameters): void
    {
        Carbon::setTestNow($parameters->getDate());

        if ($parameters->getTaxInfoOptions() !== null && !empty($parameters->getTaxInfoOptions())) {
            $parameters->getTaxInfoClass()::forUser($this->user)->update($parameters->getTaxInfoOptions());
        }

        $home_location_array = $this->getLocation($parameters->getHomeLocation());
        $home_location = new GeoPoint($home_location_array[0], $home_location_array[1]);

        if ($parameters->getWorkLocation() === null) {
            $work_location = $home_location;
        } else {
            $work_location_array = $this->getLocation($parameters->getWorkLocation());
            $work_location = new GeoPoint($work_location_array[0], $work_location_array[1]);
        }

        $wages = collect([]);

        if ($parameters->getWagesCallback() !== null) {
            call_user_func($parameters->getWagesCallback(), $parameters, $wages);
        } else {
            $wages->push($this->makeWage($work_location, $parameters->getWagesInCents(), $parameters->getPaycheckTipAmountInCents(), $parameters->getTakeHomeTipAmountInCents(), $parameters->getMinutesWorked()));
        }

        if ($parameters->getSupplementalWagesInCents() !== null
            && $parameters->getSupplementalWagesInCents() !== 0) {
            $wages->push($this->makeSupplementalWage($work_location, $parameters->getSupplementalWagesInCents()));
        }

        $historical_wages = collect([]);
        if ($parameters->getYtdWagesInCents() !== null
            && $parameters->getYtdWagesInCents() !== 0) {
            $historical_wages->push($this->makeWage($work_location, $parameters->getYtdWagesInCents()));
        }

        $results = $this->taxes->calculate(
            Carbon::now(),
            Carbon::now()->addWeek(),
            $home_location,
            $home_location,
            $wages,
            $historical_wages,
            $this->user,
            $parameters->getBirthDate(),
            $parameters->getPayPeriods(),
            collect([]),
            collect([]),
            collect([])
        );

        $short_name = (new ReflectionClass($parameters->getTaxClass()))->getShortName();

        /** @var TaxResult $result */
        $result = $results->get($parameters->getTaxClass());
        if ($result === null) {
            self::fail('no tax results for '.$short_name.' found');
        }

        self::assertThat(
            $result->getAmountInCents(),
            self::identicalTo($parameters->getExpectedAmountInCents()),
            $short_name.' expected '.$parameters->getExpectedAmountInCents()
            .' tax amount but got '.$result->getAmountInCents()
        );

        if ($parameters->getExpectedEarningsInCents() === null) {
            self::assertThat(
                $result->getEarningsInCents(),
                self::identicalTo($parameters->getWagesInCents()),
                $short_name.' expected '.$parameters->getWagesInCents()
                .' earnings but got '.$result->getEarningsInCents()
            );
        } else {
            self::assertThat(
                $result->getEarningsInCents(),
                self::identicalTo($parameters->getExpectedEarningsInCents()),
                $short_name.' expected '.$parameters->getExpectedEarningsInCents()
                .' earnings but got '.$result->getEarningsInCents()
            );
        }
    }

    public function validateNoTax(TestParameters $parameters): void
    {
        Carbon::setTestNow($parameters->getDate());

        if ($parameters->getTaxInfoOptions() !== null && !empty($parameters->getTaxInfoOptions())) {
            $parameters->getTaxInfoClass()::forUser($this->user)->update($parameters->getTaxInfoOptions());
        }

        $home_location_array = $this->getLocation($parameters->getHomeLocation());
        $home_location = new GeoPoint($home_location_array[0], $home_location_array[1]);

        if ($parameters->getWorkLocation() === null) {
            $work_location = $home_location;
        } else {
            $work_location_array = $this->getLocation($parameters->getWorkLocation());
            $work_location = new GeoPoint($work_location_array[0], $work_location_array[1]);
        }

        $wages = collect([
            $this->makeWage($work_location, $parameters->getWagesInCents()),
        ]);

        if ($parameters->getSupplementalWagesInCents() !== null
            && $parameters->getSupplementalWagesInCents() !== 0) {
            $wages->push($this->makeSupplementalWage($work_location, $parameters->getSupplementalWagesInCents()));
        }

        $historical_wages = collect([]);
        if ($parameters->getYtdWagesInCents() !== null
            && $parameters->getYtdWagesInCents() !== 0) {
            $historical_wages->push($this->makeWage($work_location, $parameters->getYtdWagesInCents()));
        }

        $results = $this->taxes->calculate(
            Carbon::now(),
            Carbon::now()->addWeek(),
            $home_location,
            $home_location,
            $wages,
            $historical_wages,
            $this->user,
            $parameters->getBirthDate(),
            $parameters->getPayPeriods(),
            collect([]),
            collect([]),
            collect([])
        );

        $short_name = (new ReflectionClass($parameters->getTaxClass()))->getShortName();
        if ($results->get($parameters->getTaxClass()) !== null) {
            self::fail('tax results for '.$short_name.' found but not expected');
        } else {
            $this->addToAssertionCount(1);
        }
    }
}
