<?php

namespace Appleton\Taxes\Countries\US\Ohio\NorthwoodLSD\V20190101;

use Appleton\Taxes\Countries\US\Ohio\NorthwoodLSD\NorthwoodLSDTax as BaseNorthwoodLSDTax;
use Illuminate\Database\Eloquent\Collection;

class NorthwoodLSDTax extends BaseNorthwoodLSDTax
{
    public const TAX_RATE = 0.0025;
    const ID = '8706';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * self::TAX_RATE, 2);
    }
}
