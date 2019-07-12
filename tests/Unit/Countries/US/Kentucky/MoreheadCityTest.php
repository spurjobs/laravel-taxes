<?php

namespace Appleton\Taxes\Unit\Countries\US\Kentucky;

use Appleton\Taxes\Countries\US\Kentucky\MoreheadCity\MoreheadCity;
use Carbon\Carbon;
use TestCase;

class MoreheadCityTest extends TestCase
{
    public function testMoreheadCity()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.kentucky.morehead_city'));
            $taxes->setWorkLocation($this->getLocation('us.kentucky.morehead_city'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(4.50, $results->getTax(MoreheadCity::class));
    }
}