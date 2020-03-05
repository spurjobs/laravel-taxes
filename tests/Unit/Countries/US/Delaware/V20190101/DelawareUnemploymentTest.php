<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Delaware\V20190101;

use Appleton\Taxes\Countries\US\Delaware\DelawareUnemployment\DelawareUnemployment;
use Appleton\Taxes\Tests\Unit\Countries\UnemploymentTaxTestCase;
use Appleton\Taxes\Tests\Unit\Countries\TestParameters;

class DelawareUnemploymentTest extends UnemploymentTaxTestCase
{
    private const DATE = '2020-01-01';
    private const LOCATION = 'us.delaware';
    private const TAX_CLASS = DelawareUnemployment::class;
    private const TAX_RATE = 0.015;
    private const WAGE_BASE = 1650000;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);
    }

    /**
     * @dataProvider provideData
     */
    public function testWageBase(TestParameters $parameters): void
    {
        $this->validateWageBase($parameters);
    }

    public function testWorkDifferentState(): void
    {
        $this->validateWorkDifferentState(
            self::DATE,
            self::LOCATION,
            self::TAX_CLASS,
            self::TAX_RATE
        );
    }

    public function testTaxRate(): void
    {
        $this->validateTaxRate(
            self::DATE,
            self::LOCATION,
            self::TAX_CLASS,
            0.0321
        );
    }

    public function provideData(): array
    {
        return $this->wageBaseBoundariesTestCases(
            self::DATE,
            self::LOCATION,
            self::TAX_CLASS,
            self::WAGE_BASE,
            self::TAX_RATE
        );
    }
}
