<?php

namespace Appleton\Taxes\Countries\US\RhodeIsland\RhodeIslandUnemployment\V20200101;

use Appleton\Taxes\Classes\WorkerTaxes\Payroll;
use Appleton\Taxes\Countries\US\RhodeIsland\RhodeIslandUnemployment\RhodeIslandUnemployment as BaseRhodeIslandUnemployment;

class RhodeIslandUnemployment extends BaseRhodeIslandUnemployment
{
    const FUTA_CREDIT = 0.054;
    const NEW_EMPLOYER_RATE = 0.0127;
    const WAGE_BASE = 24000;

    public function __construct(Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_rate = config('taxes.rates.us.rhode_island.unemployment', static::NEW_EMPLOYER_RATE);
    }
}
