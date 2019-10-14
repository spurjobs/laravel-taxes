<?php

namespace Appleton\Taxes\Countries\US\Oregon\Eugene;

use Carbon\Carbon;
use TestCase;

class EugeneTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testEugene($date, $pay_rate, $earnings, $home_location, $work_location, $result)
    {
        Carbon::setTestNow(
            Carbon::parse($date, 'America/Chicago')->setTimezone('UTC')
        );

        $results = $this->taxes->calculate(function ($taxes) use ($earnings, $pay_rate, $home_location, $work_location) {
            $taxes->setHomeLocation($this->getLocation($home_location));
            $taxes->setWorkLocation($this->getLocation($work_location));
            $taxes->setUser($this->user);
            $taxes->setPayRate($pay_rate);
            $taxes->setEarnings($earnings);
        });

        $this->assertSame($result, $results->getTax(Eugene::class));
    }

    public function provideTestData()
    {
        // date
        // pay rate, in cents, since that's how it's passed
        // earnings
        // home location
        // work location
        // result
        return [
            '0' => [
                'July 1, 2019 8am',
                1125,
                350,
                'us.oregon',
                'us.oregon.eugene',
                null,
            ],
            '1' => [
                'July 1, 2020 8am',
                1125,
                350,
                'us.oregon',
                'us.oregon.eugene',
                null,
            ],
            '2' => [
                'July 1, 2020 8am',
                1125,
                350,
                'us.oregon.eugene',
                'us.oregon',
                null,
            ],
            '3' => [
                'July 1, 2020 8am',
                1200,
                350,
                'us.oregon',
                'us.oregon.eugene',
                1.05,
            ],
            '4' => [
                'July 1, 2020 8am',
                1200,
                350,
                'us.oregon.eugene',
                'us.oregon',
                null,
            ],
            '5' => [
                'July 1, 2020 8am',
                1600,
                350,
                'us.oregon',
                'us.oregon.eugene',
                1.54,
            ],
            '6' => [
                'July 1, 2020 8am',
                1600,
                350,
                'us.oregon.eugene',
                'us.oregon',
                null,
            ],
        ];
    }
}
