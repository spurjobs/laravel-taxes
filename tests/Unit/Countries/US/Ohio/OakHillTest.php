<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\OakHill\OakHill;
use Carbon\Carbon;
use TestCase;

class OakHillTest extends TestCase
{
    public function testOakHill()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.oak_hill'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.oak_hill'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(1.50, $results->getTax(OakHill::class));
    }
}