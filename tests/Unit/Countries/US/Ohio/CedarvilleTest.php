<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Cedarville\Cedarville;
use Carbon\Carbon;
use TestCase;

class CedarvilleTest extends TestCase
{
    public function testCedarville()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.cedarville'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.cedarville'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(3.75, $results->getTax(Cedarville::class));
    }
}