<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Ohio\V20190101\local\sd;

use Appleton\Taxes\Countries\US\Ohio\CrestviewLSD\CrestviewLSDTax;
use Appleton\Taxes\Models\Countries\US\Ohio\OhioIncomeTaxInformation;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParameters;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class CrestviewLSDTest extends TaxTestCase
{
    private const DATE = '2019-01-01';
    private const LOCATION = 'us.ohio';
    private const TAX_CLASS = CrestviewLSDTax::class;
    private const TAX_INFO_CLASS = OhioIncomeTaxInformation::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);

        OhioIncomeTaxInformation::createForUser([
            'dependents' => 0,
            'school_district_id' => '8101',
            'exempt' => false,
        ], $this->user);
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
            ->setTaxInfoClass(self::TAX_INFO_CLASS)
            ->setPayPeriods(52);

        // slightly different. 2 Crestviews with different school district id's (1503 and 8101) but are the same tax rate.
        return [
            '00' => [
                $builder
                    ->setTaxInfoOptions([
                        'school_district_id' => '1503',
                        'exempt' => true,
                    ])
                    ->setWagesInCents(5000)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
            '01' => [
                $builder
                    ->setTaxInfoOptions(['school_district_id' => '1503'])
                    ->setWagesInCents(50000)
                    ->setExpectedAmountInCents(500)
                    ->build()
            ],
            '02' => [
                $builder
                    ->setTaxInfoOptions([
                        'school_district_id' => '1503',
                        'dependents' => 2,
                    ])
                    ->setWagesInCents(50000)
                    ->setExpectedAmountInCents(475)
                    ->build()
            ],
            '03' => [
                $builder
                    ->setTaxInfoOptions(['school_district_id' => '8101'])
                    ->setWagesInCents(50000)
                    ->setExpectedAmountInCents(500)
                    ->build()
            ],
            '04' => [
                $builder
                    ->setTaxInfoOptions([
                        'school_district_id' => '8101',
                        'dependents' => 2,
                    ])
                    ->setWagesInCents(50000)
                    ->setExpectedAmountInCents(475)
                    ->build()
            ],
            '05' => [
                $builder
                    ->setTaxInfoOptions(['school_district_id' => '0000'])
                    ->setWagesInCents(50000)
                    ->setExpectedAmountInCents(null)
                    ->build()
            ],
        ];
    }

}