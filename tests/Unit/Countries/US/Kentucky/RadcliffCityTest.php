<?php

namespace Appleton\Taxes\Unit\Countries\US\Kentucky;

use Appleton\Taxes\Countries\US\Kentucky\RadcliffCity\RadcliffCity;
use Carbon\Carbon;
use TestCase;

class RadcliffCityTest extends TestCase
{
    public function testRadcliffCity()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.kentucky.radcliff_city'));
            $taxes->setWorkLocation($this->getLocation('us.kentucky.radcliff_city'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(6.75, $results->getTax(RadcliffCity::class));
    }
}