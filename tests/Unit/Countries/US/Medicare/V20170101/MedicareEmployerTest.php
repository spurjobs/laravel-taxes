<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Medicare\V20170101;

use Appleton\Taxes\Countries\US\Medicare\MedicareEmployer;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParameters;
use Appleton\Taxes\Tests\Unit\Countries\IncomeParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class MedicareEmployerTest extends TaxTestCase
{
    private const DATE = '2017-01-01';
    private const LOCATION = 'us.alabama';
    private const TAX_CLASS = MedicareEmployer::class;

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
        $parameters = new IncomeParametersBuilder();
        $parameters
            ->setDate(self::DATE)
            ->setHomeLocation(self::LOCATION)
            ->setTaxClass(self::TAX_CLASS)
            ->setPayPeriods(1);

        return [
            '01' => [
                $parameters
                    ->setWagesInCents(230000)
                    ->setYtdWagesInCents(200000)
                    ->setExpectedAmountInCents(3335)
                    ->build()
            ],
        ];
    }
}