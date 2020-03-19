<?php

namespace Appleton\Taxes\Countries\US\Indiana\HenryIncome\V20200101;

use Appleton\Taxes\Countries\US\Indiana\HenryIncome\HenryIncome as BaseHenryIncome;

class HenryIncome extends BaseHenryIncome
{
    public function getTaxRate(): float
    {
        return 0.017;
    }
}
