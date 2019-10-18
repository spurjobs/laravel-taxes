<?php

namespace Appleton\Taxes\Tests\Unit\Countries;

use Appleton\Taxes\Classes\WorkerTaxes\GeoPoint;
use Appleton\Taxes\Classes\WorkerTaxes\Taxes;
use Appleton\Taxes\Classes\WorkerTaxes\TaxesQueryRunner;
use Appleton\Taxes\Classes\WorkerTaxes\TaxResult;
use Appleton\Taxes\Tests\Unit\UnitTestCase;
use Carbon\Carbon;
use ReflectionClass;

/**
 * @property Taxes taxes
 */
class WageBaseTaxTestCase extends UnitTestCase
{
    protected $query_runner;
    protected $taxes;

    public function setUp(): void
    {
        parent::setUp();

        $this->query_runner = new TestTaxesQueryRunner();
        $this->app->instance(TaxesQueryRunner::class, $this->query_runner);
        $this->taxes = app(Taxes::class);
    }

    protected function validateWageBase(WageBaseParameters $parameters): void
    {
        Carbon::setTestNow($parameters->getDate());

        if ($parameters->getTaxRate() !== null) {
            config($parameters->getTaxRate());
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
            null,
            1,
            collect([]),
            collect([]),
            collect([])
        );

        $short_name = (new ReflectionClass($parameters->getTaxClass()))->getShortName();

        if ($parameters->getExpectedAmountInCents() === null ||
            $parameters->getExpectedAmountInCents() === 0) {
            self::assertNull($results->get($parameters->getTaxClass()),
                'tax results for '.$short_name.' found, none expected');
            return;
        }

        /** @var TaxResult $result */
        $result = $results->get($parameters->getTaxClass());

        self::assertNotNull($result, 'no tax results for '.$short_name.' found');
        self::assertThat(
            $result->getAmountInCents(),
            self::identicalTo($parameters->getExpectedAmountInCents()),
            $short_name.' expected '.$parameters->getExpectedAmountInCents()
            .' tax amount but got '.$result->getAmountInCents());
    }

    protected function wageBaseBoundariesTestCases(
        string $date,
        string $home_location,
        string $tax_class,
        int $wage_base_in_cents,
        float $tax_rate): array
    {
        $builder = new WageBaseParametersBuilder();
        $builder
            ->setDate($date)
            ->setHomeLocation($home_location)
            ->setTaxClass($tax_class);

        return [
            'current wages not meet wage base' => [
                $builder
                    ->setWagesInCents($wage_base_in_cents - 1000)
                    ->setYtdWagesInCents(null)
                    ->setExpectedAmountInCents($this->calculate($wage_base_in_cents - 1000, $tax_rate))
                    ->build()
            ],
            'current wages meet wage base' => [
                $builder
                    ->setWagesInCents($wage_base_in_cents)
                    ->setYtdWagesInCents(null)
                    ->setExpectedAmountInCents($this->calculate($wage_base_in_cents, $tax_rate))
                    ->build()
            ],
            'current wages exceed wage base' => [
                $builder
                    ->setWagesInCents($wage_base_in_cents + 1000)
                    ->setYtdWagesInCents(null)
                    ->setExpectedAmountInCents($this->calculate($wage_base_in_cents, $tax_rate))
                    ->build()
            ],
            'total wages not meet wage base' => [
                $builder
                    ->setWagesInCents(1000)
                    ->setYtdWagesInCents($wage_base_in_cents - 2000)
                    ->setExpectedAmountInCents($this->calculate(1000, $tax_rate))
                    ->build()
            ],
            'total wages meet wage base' => [
                $builder
                    ->setWagesInCents(1000)
                    ->setYtdWagesInCents($wage_base_in_cents - 1000)
                    ->setExpectedAmountInCents($this->calculate(1000, $tax_rate))
                    ->build()
            ],
            'total wages cross wage base' => [
                $builder
                    ->setWagesInCents(2000)
                    ->setYtdWagesInCents($wage_base_in_cents - 1000)
                    ->setExpectedAmountInCents($this->calculate(1000, $tax_rate))
                    ->build()
            ],
            'ytd wages meet wage base' => [
                $builder
                    ->setWagesInCents(1000)
                    ->setYtdWagesInCents($wage_base_in_cents)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
            'ytd wages exceed wage base' => [
                $builder
                    ->setWagesInCents(1000)
                    ->setYtdWagesInCents($wage_base_in_cents + 1000)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
        ];
    }

    protected function roundedWageBaseBoundariesTestCases(
        string $date,
        string $home_location,
        string $tax_class,
        int $wage_base_in_cents,
        float $tax_rate): array
    {
        $builder = new WageBaseParametersBuilder();
        $builder
            ->setDate($date)
            ->setHomeLocation($home_location)
            ->setTaxClass($tax_class);

        return [
            'current wages not meet wage base' => [
                $builder
                    ->setWagesInCents($wage_base_in_cents - 10000)
                    ->setYtdWagesInCents(null)
                    ->setExpectedAmountInCents($this->roundToDollar($this->calculate($wage_base_in_cents - 10000, $tax_rate)))
                    ->build()
            ],
            'current wages meet wage base' => [
                $builder
                    ->setWagesInCents($wage_base_in_cents)
                    ->setYtdWagesInCents(null)
                    ->setExpectedAmountInCents($this->roundToDollar($this->calculate($wage_base_in_cents, $tax_rate)))
                    ->build()
            ],
            'current wages exceed wage base' => [
                $builder
                    ->setWagesInCents($wage_base_in_cents + 10000)
                    ->setYtdWagesInCents(null)
                    ->setExpectedAmountInCents($this->roundToDollar($this->calculate($wage_base_in_cents, $tax_rate)))
                    ->build()
            ],
            'total wages not meet wage base' => [
                $builder
                    ->setWagesInCents(10000)
                    ->setYtdWagesInCents($wage_base_in_cents - 20000)
                    ->setExpectedAmountInCents($this->roundToDollar($this->calculate(10000, $tax_rate)))
                    ->build()
            ],
            'total wages meet wage base' => [
                $builder
                    ->setWagesInCents(10000)
                    ->setYtdWagesInCents($wage_base_in_cents - 10000)
                    ->setExpectedAmountInCents($this->roundToDollar($this->calculate(10000, $tax_rate)))
                    ->build()
            ],
            'total wages cross wage base' => [
                $builder
                    ->setWagesInCents(20000)
                    ->setYtdWagesInCents($wage_base_in_cents - 10000)
                    ->setExpectedAmountInCents($this->roundToDollar($this->calculate(10000, $tax_rate)))
                    ->build()
            ],
            'ytd wages meet wage base' => [
                $builder
                    ->setWagesInCents(10000)
                    ->setYtdWagesInCents($wage_base_in_cents)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
            'ytd wages exceed wage base' => [
                $builder
                    ->setWagesInCents(10000)
                    ->setYtdWagesInCents($wage_base_in_cents + 10000)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
        ];
    }

    protected function calculate($amount, $tax_rate)
    {
        return bcmul(round(($amount / 100) * $tax_rate, 2), 100);
    }

    protected function roundToDollar(int $cents)
    {
        return round($cents, -2);
    }
}