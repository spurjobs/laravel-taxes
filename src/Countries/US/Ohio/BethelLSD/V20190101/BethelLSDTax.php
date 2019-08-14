<?php

namespace Appleton\Taxes\Countries\US\Ohio\BethelLSD\V20190101;

use Appleton\Taxes\Countries\US\Ohio\BethelLSD\BethelLSDTax as BaseBethelLSDTax;
use Illuminate\Database\Eloquent\Collection;

class BethelLSDTax extends BaseBethelLSDTax
{
    public const TAX_RATE = 0.0075;
    const ID = '5501';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * self::TAX_RATE, 2);
    }
}
