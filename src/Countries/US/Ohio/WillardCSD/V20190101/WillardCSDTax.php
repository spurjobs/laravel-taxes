<?php

namespace Appleton\Taxes\Countries\US\Ohio\WillardCSDTax\V20190101;

use Appleton\Taxes\Countries\US\Ohio\WillardCSDTax\WillardCSDTax as BaseWillardCSDTax;
use Illuminate\Database\Eloquent\Collection;

class WillardCSDTax extends BaseWillardCSDTax
{
    public const TAX_RATE = 0.0075;
    const ID = '3907';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * $this->tax_rate, 2);
    }
}
