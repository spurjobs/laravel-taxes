<?php

namespace Appleton\Taxes\Countries\US\Massachusetts\MassachusettsWorkforceTrainingFund\V20190101;

use Appleton\Taxes\Classes\Payroll;
use Appleton\Taxes\Countries\US\Massachusetts\MassachusettsWorkforceTrainingFund\MassachusettsWorkforceTrainingFund as BaseMassachusettsWorkforceTrainingFund;
use Appleton\Taxes\Traits\HasWageBase;

class MassachusettsWorkforceTrainingFund extends BaseMassachusettsWorkforceTrainingFund
{
    use HasWageBase;

    const WAGE_BASE = 15000;
    const TAX_RATE = 0.00056;

    public function compute()
    {
        return round($this->getAdjustedEarnings() * self::TAX_RATE, 2);
    }

    public function getAdjustedEarnings()
    {
        return min($this->payroll->earnings, $this->getBaseEarnings());
    }
}
