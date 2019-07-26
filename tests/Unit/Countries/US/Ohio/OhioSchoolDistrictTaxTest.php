<?php

namespace Appleton\Taxes\Unit\Countries\US\Ohio\OhioSchoolDistrictTax;

use Appleton\Taxes\Countries\US\Ohio\OhioSchoolDistrictTax\OhioSchoolDistrictTax;
use Appleton\Taxes\Models\Countries\US\Ohio\OhioIncomeTaxInformation;
use Carbon\Carbon;
use TestCase;

class OhioSchoolDistrictTaxTest extends TestCase
{
    /**
     * @dataProvider provideTestData
     */
    public function testOhioIncome($date, $exempt, $dependents, $school_district_id, $earnings, $result)
    {
        OhioIncomeTaxInformation::forUser($this->user)->update([
            'dependents' => $dependents,
            'exempt' => $exempt,
            'school_district_id' => $school_district_id,
        ]);

        Carbon::setTestNow(
            Carbon::parse($date, 'America/Chicago')->setTimezone('UTC')
        );

        $results = $this->taxes->calculate(function ($taxes) use ($earnings) {
            $taxes->setHomeLocation($this->getLocation('us.ohio'));
            $taxes->setWorkLocation($this->getLocation('us.ohio'));
            $taxes->setUser($this->user);
            $taxes->setEarnings($earnings);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame($result, $results->getTax(OhioSchoolDistrictTax::class));
    }

    public function provideTestData()
    {
        // date
        // exempt
        // dependents
        // school district id
        // earnings
        // results
        return [
            '0' => [
                'January 1, 2019 8am',
                true,
                0,
                '3301',
                50,
                null,
            ],
            '1' => [
                'January 1, 2019 8am',
                false,
                0,
                '3301',
                500,
                7.5,
            ],
            // not traditional so dependents don't matter
            '2' => [
                'January 1, 2019 8am',
                false,
                2,
                '3301',
                500,
                7.5,
            ],
            '3' => [
                'January 1, 2019 8am',
                false,
                0,
                '0502',
                500,
                5.0,
            ],
            // traditional so dependents do matter
            '4' => [
                'January 1, 2019 8am',
                false,
                2,
                '0502',
                500,
                4.75,
            ],
        ];
    }
}
