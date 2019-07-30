<?php

namespace Appleton\Taxes\Countries\US\Kentucky\FlorenceCity\V20190101;

use Appleton\Taxes\Countries\US\Kentucky\FlorenceCity\FlorenceCity as BaseFlorenceCity;
use Appleton\Taxes\Traits\HasWageBase;
use Illuminate\Database\Eloquent\Collection;

class FlorenceCity extends BaseFlorenceCity
{
    use HasWageBase;

    const TAX_RATE = 0.02;
    const WAGE_BASE = 132900;

    public function compute(Collection $tax_areas)
    {
        return round($this->payroll->withholdTax(min($this->payroll->getEarnings(), $this->getBaseEarnings($tax_areas->first()->workGovernmentalUnitArea)) * self::TAX_RATE), 2);
    }
}
