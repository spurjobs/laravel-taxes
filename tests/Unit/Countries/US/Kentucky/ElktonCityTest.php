<?php

namespace Appleton\Taxes\Unit\Countries\US\Kentucky;

use Appleton\Taxes\Countries\US\Kentucky\ElktonCity\ElktonCity;
use Carbon\Carbon;
use TestCase;

class ElktonCityTest extends TestCase
{
    public function testElktonCity()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.kentucky.elkton_city'));
            $taxes->setWorkLocation($this->getLocation('us.kentucky.elkton_city'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(6.00, $results->getTax(ElktonCity::class));
    }
}