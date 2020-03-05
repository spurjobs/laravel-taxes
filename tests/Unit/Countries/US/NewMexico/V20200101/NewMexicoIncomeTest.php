<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\NewMexico\V20200101;

use Appleton\Taxes\Countries\US\NewMexico\NewMexicoIncome\NewMexicoIncome;
use Appleton\Taxes\Models\Countries\US\NewMexico\NewMexicoIncomeTaxInformation;
use Appleton\Taxes\Tests\Unit\Countries\TestParameters;
use Appleton\Taxes\Tests\Unit\Countries\TestParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class NewMexicoIncomeTest extends TaxTestCase
{
    private const DATE = '2020-01-01';
    private const LOCATION = 'us.alabama';
    private const TAX_CLASS = NewMexicoIncome::class;
    private const TAX_INFO_CLASS = NewMexicoIncomeTaxInformation::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);

        NewMexicoIncomeTaxInformation::createForUser([
            'exempt' => false,
            'filing_status' => NewMexicoIncome::FILING_SINGLE,
            'form_version' => '2019',
            'dependents_deduction_amount' => 0,
            'deductions' => 0,
            'extra_withholding' => 0,
            'step_2_checked' => false,
            'other_income' => 0,
            'additional_withholding' => 0,
            'exemptions' => 0,
        ], $this->user);
    }

    /**
     * @dataProvider provideTestDataNewForm
     */
    public function testTaxNewForm(TestParameters $parameters): void
    {
        $this->validate($parameters);
    }

    /**
     * @dataProvider provideTestDataOldForm
     */
    public function testTaxOldForm(TestParameters $parameters): void
    {
        $this->validate($parameters);
    }

    /**
     * @dataProvider provideUseDefaultTestData
     */
    public function testTax_use_default(TestParameters $parameters): void
    {
        NewMexicoIncomeTaxInformation::forUser($this->user)->delete();

        $this->validate($parameters);
    }

    public function provideTestDataOldForm(): array
    {
        $builder = new TestParametersBuilder();
        $builder
            ->setDate(self::DATE)
            ->setHomeLocation(self::LOCATION)
            ->setTaxClass(self::TAX_CLASS)
            ->setTaxInfoClass(self::TAX_INFO_CLASS)
            ->setPayPeriods(52);

        return [
            'A' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2019',
                        'additional_withholding' => 0,
                        'exemptions' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(2350)
                    ->build()
            ],
            'B' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2019',
                        'additional_withholding' => 0,
                        'exemptions' => 0,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(59042)
                    ->build()
            ],
            'C' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2019',
                        'additional_withholding' => 0,
                        'exemptions' => 2,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(654)
                    ->build()
            ],
            'D' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2019',
                        'additional_withholding' => 10,
                        'exemptions' => 2,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(1654)
                    ->build()
            ],
            'E' => [
                $builder
                    ->setTaxInfoOptions(null)
                    ->setWagesInCents(86514)
                    ->setExpectedAmountInCents(9461)
                    ->build()
            ],
            'A2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_MARRIED,
                        'form_version' => '2019',
                        'additional_withholding' => 0,
                        'exemptions' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(731)
                    ->build()
            ],
            'B2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_MARRIED,
                        'form_version' => '2019',
                        'additional_withholding' => 0,
                        'exemptions' => 0,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(45079)
                    ->build()
            ],
            'C2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_MARRIED,
                        'form_version' => '2019',
                        'additional_withholding' => 0,
                        'exemptions' => 2,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
            'D2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_MARRIED,
                        'form_version' => '2019',
                        'additional_withholding' => 10,
                        'exemptions' => 2,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(1000)
                    ->build()
            ],
            'tasie_test1' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => true,
                        'filing_status' => NewMexicoIncome::FILING_SEPERATE,
                        'form_version' => '2019',
                        'additional_withholding' => 20,
                        'exemptions' => 1,
                    ])
                    ->setWagesInCents(33572)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
            'tasie_test2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SEPERATE,
                        'form_version' => '2019',
                        'additional_withholding' => 20,
                        'exemptions' => 1,
                    ])
                    ->setWagesInCents(33572)
                    ->setExpectedAmountInCents(3819)
                    ->build()
            ],
        ];
    }

    public function provideTestDataNewForm(): array
    {
        $builder = new TestParametersBuilder();
        $builder
            ->setDate(self::DATE)
            ->setHomeLocation(self::LOCATION)
            ->setTaxClass(self::TAX_CLASS)
            ->setTaxInfoClass(self::TAX_INFO_CLASS)
            ->setPayPeriods(52);

        return [
            'A' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 0,
                        'extra_withholding' => 0,
                        'step_2_checked' => false,
                        'other_income' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(650)
                    ->build()
            ],
            'B' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 0,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(2009)
                    ->build()
            ],
            'C' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => false,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(55394)
                    ->build()
            ],
            'D' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(77377)
                    ->build()
            ],
            'E' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 1000,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(75454)
                    ->build()
            ],
            'F' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_SINGLE,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 1000,
                        'deductions' => 500,
                        'extra_withholding' => 10,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(76454)
                    ->build()
            ],
            'A2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_JOINTLY,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 0,
                        'extra_withholding' => 0,
                        'step_2_checked' => false,
                        'other_income' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
            'B2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_JOINTLY,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 0,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(650)
                    ->build()
            ],
            'C2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_JOINTLY,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => false,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(39957)
                    ->build()
            ],
            'D2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_JOINTLY,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(55394)
                    ->build()
            ],
            'E2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_JOINTLY,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 1000,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(53471)
                    ->build()
            ],
            'F2' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_JOINTLY,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 1000,
                        'deductions' => 500,
                        'extra_withholding' => 10,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(54471)
                    ->build()
            ],
            'A3' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_HEAD_OF_HOUSEHOLD,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 0,
                        'extra_withholding' => 0,
                        'step_2_checked' => false,
                        'other_income' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(0)
                    ->build()
            ],
            'B3' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_HEAD_OF_HOUSEHOLD,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 0,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 0,
                    ])
                    ->setWagesInCents(30000)
                    ->setExpectedAmountInCents(1240)
                    ->build()
            ],
            'C3' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_HEAD_OF_HOUSEHOLD,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => false,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(49850)
                    ->build()
            ],
            'D3' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_HEAD_OF_HOUSEHOLD,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 0,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(73939)
                    ->build()
            ],
            'E3' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_HEAD_OF_HOUSEHOLD,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 1000,
                        'deductions' => 500,
                        'extra_withholding' => 0,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(72016)
                    ->build()
            ],
            'F3' => [
                $builder
                    ->setTaxInfoOptions([
                        'exempt' => false,
                        'filing_status' => NewMexicoIncome::FILING_HEAD_OF_HOUSEHOLD,
                        'form_version' => '2020',
                        'dependents_deduction_amount' => 1000,
                        'deductions' => 500,
                        'extra_withholding' => 10,
                        'step_2_checked' => true,
                        'other_income' => 1000,
                    ])
                    ->setWagesInCents(300000)
                    ->setExpectedAmountInCents(73016)
                    ->build()
            ],
        ];
    }

    public function provideUseDefaultTestData(): array
    {
        return [
            '01' => [
                (new TestParametersBuilder())
                    ->setDate(self::DATE)
                    ->setHomeLocation(self::LOCATION)
                    ->setTaxClass(self::TAX_CLASS)
                    ->setTaxInfoClass(self::TAX_INFO_CLASS)
                    ->setWagesInCents(80000)
                    ->setPayPeriods(52)
                    ->setExpectedAmountInCents(6408)
                    ->build()
            ],
        ];
    }
}
