<?php

namespace Appleton\Taxes\Classes;

use Appleton\Taxes\Countries\US\Alabama\AlabamaIncome\AlabamaIncome;
use Appleton\Taxes\Countries\US\Alabama\AlabamaUnemployment\AlabamaUnemployment;
use Appleton\Taxes\Countries\US\Alabama\BirminghamOccupational\BirminghamOccupational;
use Appleton\Taxes\Countries\US\FederalIncome\FederalIncome;
use Appleton\Taxes\Countries\US\FederalUnemployment\FederalUnemployment;
use Appleton\Taxes\Countries\US\Medicare\Medicare;
use Appleton\Taxes\Countries\US\Medicare\MedicareEmployer;
use Appleton\Taxes\Countries\US\SocialSecurity\SocialSecurity;
use Appleton\Taxes\Countries\US\SocialSecurity\SocialSecurityEmployer;
use Carbon\Carbon;

class TaxesTest extends \TestCase
{
    public function testTaxes()
    {
        $results = $this->taxes->calculate(function ($taxes) {
            $taxes->setWorkLocation($this->getLocation('us.alabama.birmingham'));
            $taxes->setUser($this->user);
            $taxes->setEarnings(66.68);
            $taxes->setPayPeriods(260);
            $taxes->setDate(Carbon::now()->addMonth());
        });

        $this->assertSame(6.88, $results->getTax(FederalIncome::class));
        $this->assertSame(0.40, $results->getTax(FederalUnemployment::class));
        $this->assertSame(0.97, $results->getTax(Medicare::class));
        $this->assertSame(0.97, $results->getTax(MedicareEmployer::class));
        $this->assertSame(4.13, $results->getTax(SocialSecurity::class));
        $this->assertSame(4.13, $results->getTax(SocialSecurityEmployer::class));
        $this->assertSame(2.07, $results->getTax(AlabamaIncome::class));
        $this->assertSame(1.80, $results->getTax(AlabamaUnemployment::class));
        $this->assertSame(0.67, $results->getTax(BirminghamOccupational::class));
    }
}
