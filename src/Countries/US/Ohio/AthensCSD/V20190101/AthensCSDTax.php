<?php

namespace Appleton\Taxes\Countries\US\Ohio\AthensCSD\V20190101;

use Appleton\Taxes\Countries\US\Ohio\AthensCSD\AthensCSDTax as BaseAthensCSDTax;
use Illuminate\Database\Eloquent\Collection;

class AthensCSDTax extends BaseAthensCSDTax
{
    public const TAX_RATE = 0.01;
    const ID = '0502';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * self::TAX_RATE, 2);
    }
}
