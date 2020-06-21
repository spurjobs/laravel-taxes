<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Michigan\V20200101\MichiganCityTaxes;

use Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\DetroitTax\DetroitTax;
use Appleton\Taxes\Countries\US\Michigan\MichiganIncome\MichiganIncome;
use Appleton\Taxes\Models\Countries\US\Michigan\MichiganIncomeTaxInformation;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;
use Appleton\Taxes\Tests\Unit\Countries\TestParameters;
use Appleton\Taxes\Tests\Unit\Countries\TestParametersBuilder;

class DetroitTaxTest extends TaxTestCase
{
    private const DATE = '2020-01-01';
    private const LOCATION = 'us.michigan';
    private const TAX_CLASS = DetroitTax::class;
    private const TAX_INFO_CLASS = MichiganIncomeTaxInformation::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);

        MichiganIncomeTaxInformation::createForUser([
            'additional_withholding' => 0,
            'dependents' => 0,
            'exempt' => false,
            'filing_status' => MichiganIncome::FILING_SINGLE,
        ], $this->user);
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
            ->setTaxInfoClass(self::TAX_INFO_CLASS)
            ->setPayPeriods(52);

        return [
            // 'resident living in a city that levies a tax' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(720)
            //         ->build()
            // ],
            // 'resident living in a city that levies a tax resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(665)
            //         ->build()
            // ],
            // 'resident living in a city that levies a tax nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(720)
            //         ->build()
            // ],
            // 'resident living in a city that levies a tax and works in another city' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'Detroit',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(720)
            //         ->build()
            // ],
            // 'resident living in a city that levies a tax and works in another city resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'Detroit',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(665)
            //         ->build()
            // ],
            // 'resident living in a city that levies a tax and works in another city nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'Detroit',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(720)
            //         ->build()
            // ],
            // 'nonresident working in a city that levies the local tax but does not live in a city that levies a local tax' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'primary_nonresident_city' => 'Detroit',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(360)
            //         ->build()
            // ],
            // 'nonresident working in a city that levies the local tax but does not live in a city that levies a local tax resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'primary_nonresident_city' => 'Detroit',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(360)
            //         ->build()
            // ],
            // 'nonresident working in a city that levies the local tax but does not live in a city that levies a local tax nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'primary_nonresident_city' => 'Detroit',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(332)
            //         ->build()
            // ],
            'resident living in a city that levies a tax and works in another city that levies a tax' => [
                $builder
                    ->setTaxInfoOptions([
                        'resident_city' => 'Detroit',
                        'primary_nonresident_city' => 'GrandRapids',
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(495)
                    ->build()
            ],
            // 'resident living in a city that levies a tax and works in another city that levies a tax resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(457)
            //         ->build()
            // ],
            // 'resident living in a city that levies a tax and works in another city that levies a tax nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(495)
            //         ->build()
            // ],
            // 'nonresident living in a city that levies a tax and works in another city that levies a tax' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'Detroit',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(360)
            //         ->build()
            // ],
            // 'nonresident living in a city that levies a tax and works in another city that levies a tax resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'Detroit',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(360)
            //         ->build()
            // ],
            // 'nonresident living in a city that levies a tax and works in another city that levies a tax nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'Detroit',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(332)
            //         ->build()
            // ],
            // 'Lives AND works in a city that levies a tax AND works in another city that levies a tax' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'Detroit',
            //             'secondary_nonresident_city' => 'GrandRapids',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(495)
            //         ->build()
            // ],
            // 'Lives AND works in a city that levies a tax AND works in another city that levies a tax resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'Detroit',
            //             'secondary_nonresident_city' => 'GrandRapids',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(457)
            //         ->build()
            // ],
            // 'Lives AND works in a city that levies a tax AND works in another city that levies a tax nonresident_exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'Detroit',
            //             'secondary_nonresident_city' => 'GrandRapids',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(495)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Hamtramck',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(720)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Hamtramck',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(665)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax nonresident_exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'Detroit',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Hamtramck',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(720)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax not resident city primary higher percentage' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Detroit',
            //             'primary_nonresident_city_percentage_worked' => '60',
            //             'secondary_nonresident_city_percentage_worked' => '40',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(0)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax not resident city primary higher percentage resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Detroit',
            //             'primary_nonresident_city_percentage_worked' => '60',
            //             'secondary_nonresident_city_percentage_worked' => '40',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(0)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax not resident city primary higher percentage nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Detroit',
            //             'primary_nonresident_city_percentage_worked' => '60',
            //             'secondary_nonresident_city_percentage_worked' => '40',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(0)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax not resident city secondary higher percentage' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Detroit',
            //             'primary_nonresident_city_percentage_worked' => '40',
            //             'secondary_nonresident_city_percentage_worked' => '60',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(216)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax not resident city secondary higher percentage resident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Detroit',
            //             'primary_nonresident_city_percentage_worked' => '40',
            //             'secondary_nonresident_city_percentage_worked' => '60',
            //             'resident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(216)
            //         ->build()
            // ],
            // 'Lives in a city that levies a tax AND works in 2 other cities that both levy a tax not resident city secondary higher percentage nonresident exemptions' => [
            //     $builder
            //         ->setTaxInfoOptions([
            //             'resident_city' => 'GrandRapids',
            //             'primary_nonresident_city' => 'GrandRapids',
            //             'secondary_nonresident_city' => 'Detroit',
            //             'primary_nonresident_city_percentage_worked' => '40',
            //             'secondary_nonresident_city_percentage_worked' => '60',
            //             'nonresident_exemptions' => '2',
            //         ])
            //         ->setWagesInCents(30000)
            //         ->setExpectedAmountInCents(188)
            //         ->build()
            // ],
        ];
    }
}
