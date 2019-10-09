<?php
namespace Appleton\Taxes\Countries\US\WashingtonDC\WashingtonDCUnemployment\V20190101;

use Appleton\Taxes\Classes\Payroll;
use Appleton\Taxes\Countries\US\WashingtonDC\WashingtonDCUnemployment\WashingtonDCUnemployment as BaseWashingtonDCUnemployment;

class WashingtonDCUnemployment extends BaseWashingtonDCUnemployment
{
    const FUTA_CREDIT = 0.054;
    const NEW_EMPLOYER_RATE = 0.027;
    const WAGE_BASE = 9000;

    public function __construct(Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_rate = config('taxes.rates.us.washingtondc.unemployment', static::NEW_EMPLOYER_RATE);
    }
}
