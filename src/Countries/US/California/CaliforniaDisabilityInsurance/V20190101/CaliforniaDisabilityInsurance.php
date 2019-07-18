<?php

namespace Appleton\Taxes\Countries\US\California\CaliforniaDisabilityInsurance\V20190101;

use Appleton\Taxes\Countries\US\California\CaliforniaDisabilityInsurance\CaliforniaDisabilityInsurance as BaseCaliforniaDisabilityInsurance;
use Appleton\Taxes\Traits\HasWageBase;
use Illuminate\Database\Eloquent\Collection;

class CaliforniaDisabilityInsurance extends BaseCaliforniaDisabilityInsurance
{
    use HasWageBase;

    const TAX_RATE = 0.01;
    const WAGE_BASE = 118371;

    public function compute(Collection $tax_areas)
    {
        $this->tax_total = $this->payroll->withholdTax($this->getBaseEarningsWageBase() * static::TAX_RATE);
        return round($this->tax_total, 2);
    }
}