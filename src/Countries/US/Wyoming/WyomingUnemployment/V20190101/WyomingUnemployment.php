<?php

namespace Appleton\Taxes\Countries\US\Wyoming\WyomingUnemployment\V20190101;

use Appleton\Taxes\Classes\Payroll;
use Appleton\Taxes\Countries\US\Wyoming\WyomingUnemployment\WyomingUnemployment as BaseWyomingUnemployment;

class WyomingUnemployment extends BaseWyomingUnemployment
{
    const FUTA_CREDIT = 0.054;
    const NEW_EMPLOYER_RATE = .0122;
    const WAGE_BASE = 25400;

    public function __construct(Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_rate = config('taxes.rates.us.wyoming.unemployment', static::NEW_EMPLOYER_RATE);
    }
}
