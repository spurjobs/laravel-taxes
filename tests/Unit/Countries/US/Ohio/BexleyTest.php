<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio;

use Appleton\Taxes\Countries\US\Ohio\Bexley\Bexley;
use Carbon\Carbon;
use TestCase;

class BexleyTest extends TestCase
{
    public function testBexley()
    {
        Carbon::setTestNow(Carbon::parse('2019-02-01'));

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.ohio.bexley'));
            $taxes->setWorkLocation($this->getLocation('us.ohio.bexley'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(7.50, $results->getTax(Bexley::class));
    }
}