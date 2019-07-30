<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Wayne\Wayne;
use Carbon\Carbon;
use TestCase;

class WayneTest extends TestCase
{
    public function testWayne()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.wayne'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.wayne'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(2.25, $results->getTax(Wayne::class));
    }
}
