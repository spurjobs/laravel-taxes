<?php

namespace Appleton\Taxes\Unit\Countries\US\Kentucky;

use Appleton\Taxes\Countries\US\Kentucky\LincolnCounty\LincolnCounty;
use Carbon\Carbon;
use TestCase;

class LincolnCountyTest extends TestCase
{
    public function testLincolnCounty()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.kentucky.lincoln_county'));
            $taxes->setWorkLocation($this->getLocation('us.kentucky.lincoln_county'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(3.00, $results->getTax(LincolnCounty::class));
    }
}