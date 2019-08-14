<?php

namespace Appleton\Taxes\Unit\Countries\US\Kentucky;

use Appleton\Taxes\Countries\US\Kentucky\CarrollCounty\CarrollCounty;
use Carbon\Carbon;
use TestCase;

class CarrollCountyTest extends TestCase
{
    public function testCarrollCounty()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.kentucky.carroll_county'));
            $taxes->setWorkLocation($this->getLocation('us.kentucky.carroll_county'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(5300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(3.00, $results->getTax(CarrollCounty::class));
    }
}
