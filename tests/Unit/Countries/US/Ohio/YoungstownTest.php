<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Youngstown\Youngstown;
use Carbon\Carbon;
use TestCase;

class YoungstownTest extends TestCase
{
    public function testYoungstown()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.youngstown'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.youngstown'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(8.25, $results->getTax(Youngstown::class));
    }
}