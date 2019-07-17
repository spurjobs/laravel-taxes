<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Edison\Edison;
use Carbon\Carbon;
use TestCase;

class EdisonTest extends TestCase
{
    public function testEdison()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.edison'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.edison'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(1.50, $results->getTax(Edison::class));
    }
}
