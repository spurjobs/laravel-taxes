<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Kentucky\V20200101\local;

use Appleton\Taxes\Countries\US\Kentucky\HighlandHeightsCity\HighlandHeightsCity;
use Appleton\Taxes\Tests\Unit\Countries\TestParameters;
use Appleton\Taxes\Tests\Unit\Countries\TestParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class HighlandHeightsCityTest extends TaxTestCase
{
    private const DATE = '2020-01-01';
    private const LOCATION = 'us.kentucky.highland_heights_city';
    private const TAX_CLASS = HighlandHeightsCity::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);
    }

    /**
     * @dataProvider provideTestData
     */
    public function testTax(TestParameters $parameters): void
    {
        $this->validate($parameters);
    }

    public function provideTestData(): array
    {
        $builder = new TestParametersBuilder();
        $builder
            ->setDate(self::DATE)
            ->setHomeLocation(self::LOCATION)
            ->setTaxClass(self::TAX_CLASS)
            ->setPayPeriods(52);

        return [
            '00' => [
                $builder
                    ->setWagesInCents(0)
                    ->setYtdLiabilitiesInCents(0)
                    ->setExpectedAmountInCents(0)
                    ->setExpectedEarningsInCents(0)
                    ->build()
            ],
            '01' => [
                $builder
                    ->setWagesInCents(30000)
                    ->setYtdLiabilitiesInCents(500000)
                    ->setExpectedAmountInCents(300)
                    ->setExpectedEarningsInCents(30000)
                    ->build()
            ],
            '02' => [
                $builder
                    ->setWagesInCents(90000)
                    ->setYtdLiabilitiesInCents(9910000)
                    ->setExpectedAmountInCents(900)
                    ->setExpectedEarningsInCents(90000)
                    ->build()
            ],
            'over wage base' => [
                $builder
                    ->setWagesInCents(77100)
                    ->setYtdLiabilitiesInCents(13770000)
                    ->setExpectedAmountInCents(0)
                    ->setExpectedEarningsInCents(0)
                    ->build()
            ],
        ];
    }
}
