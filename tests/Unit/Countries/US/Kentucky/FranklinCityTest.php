<?php

namespace Appleton\Taxes\Unit\Countries\US\Kentucky;

use Appleton\Taxes\Countries\US\Kentucky\FranklinCity\FranklinCity;
use Carbon\Carbon;
use TestCase;

class FranklinCityTest extends TestCase
{
    public function testFranklinCity()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.kentucky.franklin_city'));
            $taxes->setWorkLocation($this->getLocation('us.kentucky.franklin_city'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(3.00, $results->getTax(FranklinCity::class));
    }
}