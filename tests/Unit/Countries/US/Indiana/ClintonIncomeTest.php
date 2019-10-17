<?php

namespace Appleton\Taxes\Unit\Countries\US\Indiana;

use Appleton\Taxes\Classes\Taxes;
use Appleton\Taxes\Countries\US\Indiana\ClintonIncome\ClintonIncome;
use Appleton\Taxes\Models\Countries\US\Indiana\IndianaIncomeTaxInformation;
use Carbon\Carbon;
use TestCase;

class ClintonIncomeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Carbon::setTestNow(Carbon::parse('2019-01-01'));
    }

    /**
    * @dataProvider provideTestData
    */
    public function testClintonIncome($date, $result): void
    {
        Carbon::setTestNow(Carbon::parse($date));

        IndianaIncomeTaxInformation::forUser($this->user)->update([
            'personal_exemptions' => 0,
            'dependent_exemptions' => 0,
            'exempt' => false,
            'additional_withholding' => 0,
            'county_lived' => 12,
            'county_worked' => 11,
        ]);

        $results = $this->taxes->calculate(function (Taxes $taxes) {
            $taxes->setHomeLocation($this->getLocation('us.indiana.clinton'));
            $taxes->setWorkLocation($this->getLocation('us.indiana.clinton'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertThat($result, self::identicalTo($results->getTax(ClintonIncome::class)));
    }

    public function testClintonIncomeCountyWorked(): void
    {
        IndianaIncomeTaxInformation::forUser($this->user)->update([
            'personal_exemptions' => 0,
            'dependent_exemptions' => 0,
            'exempt' => false,
            'additional_withholding' => 0,
            'county_lived' => 0,
            'county_worked' => 12,
        ]);

        $results = $this->taxes->calculate(function (Taxes $taxes) {
            $taxes->setHomeLocation($this->getLocation('us.indiana.clinton'));
            $taxes->setWorkLocation($this->getLocation('us.indiana.clinton'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertThat(6.75, self::identicalTo($results->getTax(ClintonIncome::class)));
    }

    public function provideTestData(): array
    {
        return [
            '2019-01-01' => ['2019-01-01', 6.75],
            '2019-10-01' => ['2019-10-01', 7.35],
        ];
    }
}
