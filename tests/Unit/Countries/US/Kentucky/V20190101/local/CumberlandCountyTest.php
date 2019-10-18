<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Kentucky\V20190101;

use Appleton\Taxes\Countries\US\Kentucky\CumberlandCounty\CumberlandCounty;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParameters;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class CumberlandCountyTest extends TaxTestCase
{
    private const DATE = '2019-01-01';
    private const LOCATION = 'us.kentucky.cumberland_county';
    private const TAX_CLASS = CumberlandCounty::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);
    }

    /**
     * @dataProvider provideTestData
     */
    public function testTax(IncomeParameters $parameters): void
    {
        $this->validate($parameters);
    }

    public function provideTestData(): array
    {
        $builder = new IncomeParametersBuilder();
        $builder
            ->setDate(self::DATE)
            ->setHomeLocation(self::LOCATION)
            ->setTaxClass(self::TAX_CLASS)
            ->setPayPeriods(52);

        return [
            '00' => [
                $builder
                    ->setWagesInCents(0)
                    ->setYtdWagesInCents(0)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
            '01' => [
                $builder
                    ->setWagesInCents(30000)
                    ->setYtdWagesInCents(500000)
                    ->setExpectedAmountInCents(375)
                    ->build()
            ],
            '02' => [
                $builder
                    ->setWagesInCents(90000)
                    ->setYtdWagesInCents(5910000)
                    ->setExpectedAmountInCents(1125)
                    ->build()
            ],
            '03' => [
                $builder
                    ->setWagesInCents(77100)
                    ->setYtdWagesInCents(6000000)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
        ];
    }
}