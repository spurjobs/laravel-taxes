<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\OttawaHills\OttawaHills;
use Carbon\Carbon;
use TestCase;

class OttawaHillsTest extends TestCase
{
    public function testOttawaHills()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.ottawa_hills'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.ottawa_hills'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(4.50, $results->getTax(OttawaHills::class));
    }
}