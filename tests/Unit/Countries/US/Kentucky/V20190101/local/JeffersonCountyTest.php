<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Kentucky\V20190101\local;

use Appleton\Taxes\Countries\US\Kentucky\JeffersonCounty\JeffersonCounty;
use Appleton\Taxes\Models\Countries\US\Kentucky\KentuckyIncomeTaxInformation;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;
use Appleton\Taxes\Tests\Unit\Countries\TestParameters;
use Appleton\Taxes\Tests\Unit\Countries\TestParametersBuilder;

class JeffersonCountyTest extends TaxTestCase
{
    private const DATE = '2019-01-01';
    private const ALABAMA_LOCATION = 'us.alabama';
    private const KENTUCKY_LOCATION = 'us.kentucky';
    private const JEFFERSON_COUNTY_LOCATION = 'us.kentucky.jefferson_county';
    private const TAX_CLASS = JeffersonCounty::class;
    private const TAX_INFO_CLASS = KentuckyIncomeTaxInformation::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);

        KentuckyIncomeTaxInformation::createForUser([
            'additional_withholding' => 0,
            'exempt' => false,
        ], $this->user);

        $this->disableTestQueryRunner();
    }

    /**
     * @dataProvider provideTestData
     */
    public function testTax(TestParameters $parameters): void
    {
        $this->validate($parameters);
    }

    /**
     * @dataProvider provideNoTaxTestData
     */
    public function testNoTax(TestParameters $parameters): void
    {
        $this->validateNoTax($parameters);
    }

    public function provideTestData(): array
    {
        $builder = new TestParametersBuilder();
        $builder
            ->setDate(self::DATE)
            ->setTaxClass(self::TAX_CLASS)
            ->setTaxInfoClass(self::TAX_INFO_CLASS)
            ->setPayPeriods(52);

        return [
            '00' => [
                $builder
                    ->setHomeLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setWorkLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setTaxInfoOptions(null)
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(660)
                    ->build()
            ],
            '01' => [
                $builder
                    ->setHomeLocation(self::KENTUCKY_LOCATION)
                    ->setWorkLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setTaxInfoOptions(null)
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(435)
                    ->build()
            ],
            '02' => [
                $builder
                    ->setHomeLocation(self::ALABAMA_LOCATION)
                    ->setWorkLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setTaxInfoOptions(null)
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(435)
                    ->build()
            ],
            '03' => [
                $builder
                    ->setHomeLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setWorkLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setTaxInfoOptions(['exempt' => true])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
            '04' => [
                $builder
                    ->setHomeLocation(self::KENTUCKY_LOCATION)
                    ->setWorkLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setTaxInfoOptions(['exempt' => true])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
            '05' => [
                $builder
                    ->setHomeLocation(self::ALABAMA_LOCATION)
                    ->setWorkLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setTaxInfoOptions(['exempt' => true])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
        ];
    }

    public function provideNoTaxTestData()
    {
        $builder = new TestParametersBuilder();
        $builder
            ->setDate(self::DATE)
            ->setTaxClass(self::TAX_CLASS)
            ->setPayPeriods(52);

        return [
            '00' => [
                $builder
                    ->setHomeLocation(self::JEFFERSON_COUNTY_LOCATION)
                    ->setWorkLocation(self::KENTUCKY_LOCATION)
                    ->setWagesInCents(30000)
                    ->build()
            ],
            '01' => [
                $builder
                    ->setHomeLocation(self::KENTUCKY_LOCATION)
                    ->setWorkLocation(self::KENTUCKY_LOCATION)
                    ->setWagesInCents(30000)
                    ->build()
            ],
        ];
    }
}
