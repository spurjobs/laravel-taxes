<?php

namespace Appleton\Taxes\Countries\US\Alabama\AlabamaUnemployment;

class AlabamaUnemploymentTest extends \TestCase
{
    public function testAlabamaUnemployment()
    {
        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setWorkLocation(32.3182, -86.9023);
            $taxes->setUser($this->user);
            $taxes->setEarnings(2300);
        });

        $this->assertSame(62.10, $results->getTax(AlabamaUnemployment::class));
    }

    public function testAlabamaUnemploymentWithTaxRate()
    {
        config(['taxes.rates.us.alabama.unemployment' => 0.024]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setWorkLocation(32.3182, -86.9023);
            $taxes->setUser($this->user);
            $taxes->setEarnings(2300);
        });

        $this->assertSame(55.20, $results->getTax(AlabamaUnemployment::class));
    }

    public function testAlabamaUnemploymentMetWageBase()
    {
        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setWorkLocation(32.3182, -86.9023);
            $taxes->setUser($this->user);
            $taxes->setEarnings(2300);
            $taxes->setYtdEarnings(8000);
        });

        $this->assertSame(0.0, $results->getTax(AlabamaUnemployment::class));
    }

    public function testCaseStudy1()
    {
        config(['taxes.rates.us.alabama.unemployment' => 0.019]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setWorkLocation(32.3182, -86.9023);
            $taxes->setUser($this->user);
            $taxes->setEarnings(66.68);
        });

        $this->assertSame(1.27, $results->getTax(AlabamaUnemployment::class));
    }
}
