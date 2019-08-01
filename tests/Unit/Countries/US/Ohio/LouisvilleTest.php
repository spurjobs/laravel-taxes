<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Louisville\Louisville;
use Carbon\Carbon;
use TestCase;

class LouisvilleTest extends TestCase
{
    public function testLouisville()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.louisville'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.louisville'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(6.00, $results->getTax(Louisville::class));
    }
}