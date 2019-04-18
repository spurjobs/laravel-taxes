<?php

namespace Appleton\Taxes\Unit\Countries\US\Indiana;

use Appleton\Taxes\Classes\Taxes;
use Appleton\Taxes\Countries\US\Indiana\AllenIncome\AllenIncome;
use Appleton\Taxes\Countries\US\Indiana\IndianaIncome\IndianaIncome;
use Appleton\Taxes\Models\Countries\US\Indiana\IndianaIncomeTaxInformation;
use Carbon\Carbon;
use TestCase;

class AllenIncomeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Carbon::setTestNow(Carbon::parse('2019-01-01'));
    }

    /**
     * Weekly Pay               $300.00
     * Personal Exemptions      0
     * Dependent Exemptions     1
     * Tax Due                  $4.01
     *
     * Math:
     * 0 personal exemptions * 1000 = 0
     * 1 dependent exemptions * 1500 = 1500
     * 1500 total allowances / 52 weeks = 28.846154
     * 300 - 28.846154 = 271.15385 taxable wages
     * round(271.15385 * .0148) = 4.01 tax
     */
    public function testAllenIncome(): void
    {
        IndianaIncomeTaxInformation::createForUser([
            'personal_exemptions' => 0,
            'dependent_exemptions' => 1,
            'exempt' => false,
            'additional_withholding' => 0,
        ], $this->user);

        $results = $this->taxes->calculate(function (Taxes $taxes) {
            $taxes->setHomeLocation($this->getLocation('us.indiana.allen'));
            $taxes->setWorkLocation($this->getLocation('us.indiana.allen'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(300);
            $taxes->setPayPeriods(52);
        });

        $this->assertThat(4.01, self::identicalTo($results->getTax(AllenIncome::class)));
    }
}
