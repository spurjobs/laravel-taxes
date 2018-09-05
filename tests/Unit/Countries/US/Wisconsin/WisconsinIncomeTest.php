<?php

namespace Appleton\Taxes\Countries\US\Wisconsin\WisconsinIncome;

use Appleton\Taxes\Models\Countries\US\Wisconsin\WisconsinIncomeTaxInformation;
use Carbon\Carbon;

class WisconsinIncomeTest extends \TestCase
{
    public function setUp()
    {
        parent::setUp();

        Carbon::setTestNow(
            Carbon::parse('January 1, 2018 8am', 'America/Chicago')->setTimezone('UTC')
        );
    }

    public function testWisconsinIncome()
    {
        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.wisconsin'));
            $taxes->setWorkLocation($this->getLocation('us.wisconsin'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(1000);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(48.95, $results->getTax(WisconsinIncome::class));

        WisconsinIncomeTaxInformation::forUser($this->user)->update(['filing_status' => WisconsinIncome::FILING_MARRIED]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.wisconsin'));
            $taxes->setWorkLocation($this->getLocation('us.wisconsin'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(1000);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(47.01, $results->getTax(WisconsinIncome::class));

        WisconsinIncomeTaxInformation::forUser($this->user)->update(['filing_status' => WisconsinIncome::FILING_SEPERATE]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.wisconsin'));
            $taxes->setWorkLocation($this->getLocation('us.wisconsin'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(1000);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(50.89, $results->getTax(WisconsinIncome::class));
    }

    public function testIncomeExemptions()
    {
        WisconsinIncomeTaxInformation::forUser($this->user)->update(['exemptions' => 1]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.wisconsin'));
            $taxes->setWorkLocation($this->getLocation('us.wisconsin'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(1000);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(48.47, $results->getTax(WisconsinIncome::class));
    }

    public function testWisconsinIncomeClaimExempt()
    {
        $wisconsin_income_tax_information = WisconsinIncomeTaxInformation::forUser($this->user);
        $wisconsin_income_tax_information->update([
            'exemptions' => 1,
            'exempt' => true
        ]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.wisconsin'));
            $taxes->setWorkLocation($this->getLocation('us.wisconsin'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(1000);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(0.00, $results->getTax(WisconsinIncome::class));

        $wisconsin_income_tax_information->update([
            'exempt' => false
        ]);

        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setHomeLocation($this->getLocation('us.wisconsin'));
            $taxes->setWorkLocation($this->getLocation('us.wisconsin'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(1000);
            $taxes->setPayPeriods(52);
        });

        $this->assertSame(48.47, $results->getTax(WisconsinIncome::class));
    }
}
