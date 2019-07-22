<?php

namespace Appleton\Taxes\Countries\US\NewJersey\NewJerseyUnemploymentInsurance\V20190101;

use Appleton\Taxes\Countries\US\NewJersey\NewJerseyUnemploymentInsurance\NewJerseyUnemploymentInsurance as BaseNewJerseyUnemploymentInsurance;
use Appleton\Taxes\Traits\HasWageBase;
use Illuminate\Database\Eloquent\Collection;

class NewJerseyUnemploymentInsurance extends BaseNewJerseyUnemploymentInsurance
{
    use HasWageBase;

    const TAX_RATE = 0.00425;
    const WAGE_BASE = 34400;

    public function compute(Collection $tax_areas)
    {
        return round($this->payroll->withholdTax($this->getAdjustedEarnings() * self::TAX_RATE), 2);
    }

    public function getAdjustedEarnings()
    {
        return min($this->payroll->getEarnings(), $this->getBaseEarnings());
    }
}
