<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Lakeview\Lakeview;
use Carbon\Carbon;
use TestCase;

class LakeviewTest extends TestCase
{
    public function testLakeview()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.lakeview'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.lakeview'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(4.50, $results->getTax(Lakeview::class));
    }
}
