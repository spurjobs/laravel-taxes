<?php

namespace Appleton\Taxes\Countries\US\Ohio\JeffersonLSD\V20190101;

use Appleton\Taxes\Countries\US\Ohio\JeffersonLSD\JeffersonLSDTax as BaseJeffersonLSDTax;
use Illuminate\Database\Eloquent\Collection;

class JeffersonLSDTax extends BaseJeffersonLSDTax
{
    public const TAX_RATE = 0.01;
    const ID = '4901';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * self::TAX_RATE, 2);
    }
}
