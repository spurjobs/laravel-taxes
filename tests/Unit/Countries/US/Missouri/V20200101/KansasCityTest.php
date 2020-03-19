<?php

namespace Appleton\Taxes\Tests\Unit\Countries\US\Missouri\V20200101;

use Appleton\Taxes\Countries\US\Missouri\KansasCity\KansasCity;
use Appleton\Taxes\Tests\Unit\Countries\TestParametersBuilder;
use Appleton\Taxes\Tests\Unit\Countries\TaxTestCase;

class KansasCityTest extends TaxTestCase
{
    private const DATE = '2020-01-01';
    private const LOCATION = 'us.missouri.kansas_city';
    private const TAX_CLASS = KansasCity::class;

    public function setUp(): void
    {
        parent::setUp();
        $this->query_runner->addTax(self::TAX_CLASS);
    }

    public function testTax(): void
    {
        $this->validate(
            (new TestParametersBuilder())
                ->setDate(self::DATE)
                ->setHomeLocation(self::LOCATION)
                ->setTaxClass(self::TAX_CLASS)
                ->setPayPeriods(52)
                ->setWagesInCents(30000)
                ->setExpectedAmountInCents(30)
                ->build()
        );
    }
}
