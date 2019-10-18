<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Kentucky\V20190101;

use Appleton\Taxes\Countries\US\Kentucky\KentonCounty\KentonCounty;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParameters;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class KentonCountyTest extends TaxTestCase
{
    private const DATE = '2019-01-01';
    private const LOCATION = 'us.kentucky.kenton_county';
    private const TAX_CLASS = KentonCounty::class;

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
                    ->setWagesInCents(30000)
                    ->setYtdWagesInCents(0)
                    ->setExpectedAmountInCents(213)
                    ->build()
            ],
            '01' => [
                $builder
                    ->setWagesInCents(30000)
                    ->setYtdWagesInCents(2500000)
                    ->setExpectedAmountInCents(33)
                    ->build()
            ],
            '02' => [
                $builder
                    ->setWagesInCents(90000)
                    ->setYtdWagesInCents(13290000)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
        ];
    }
}