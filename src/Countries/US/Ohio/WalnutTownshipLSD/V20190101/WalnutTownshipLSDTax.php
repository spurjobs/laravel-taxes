<?php

namespace Appleton\Taxes\Countries\US\Ohio\WalnutTownshipLSD\V20190101;

use Appleton\Taxes\Countries\US\Ohio\WalnutTownshipLSD\WalnutTownshipLSDTax as BaseWalnutTownshipLSDTax;
use Illuminate\Database\Eloquent\Collection;

class WalnutTownshipLSDTax extends BaseWalnutTownshipLSDTax
{
    public const TAX_RATE = 0.0175;
    const ID = '2308';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * self::TAX_RATE, 2);
    }
}
