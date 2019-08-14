<?php

namespace Appleton\Taxes\Countries\US\Ohio\MiltonUnionEVSD\V20190101;

use Appleton\Taxes\Countries\US\Ohio\MiltonUnionEVSD\MiltonUnionEVSDTax as BaseMiltonUnionEVSDTax;
use Illuminate\Database\Eloquent\Collection;

class MiltonUnionEVSDTax extends BaseMiltonUnionEVSDTax
{
    public const TAX_RATE = 0.0125;
    const ID = '5505';

    public function compute(Collection $tax_areas)
    {
        if ($this->tax_information->exempt || $this->tax_information->school_district_id !== self::ID) {
            return 0.0;
        }

        return round($this->payroll->getEarnings() * self::TAX_RATE, 2);
    }
}
