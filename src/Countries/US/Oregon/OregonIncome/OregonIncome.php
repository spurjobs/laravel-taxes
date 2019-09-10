<?php

namespace Appleton\Taxes\Countries\US\Oregon\OregonIncome;

use Appleton\Taxes\Classes\BaseStateIncome;
use Appleton\Taxes\Classes\Payroll;
use Appleton\Taxes\Models\Countries\US\Oregon\OregonIncomeTaxInformation;

abstract class OregonIncome extends BaseStateIncome
{
    const FILING_SINGLE = 'S';
    const FILING_MARRIED = 'M';

    const FILING_STATUSES = [
        self::FILING_SINGLE => 'Filing Single',
        self::FILING_MARRIED => 'Filing Married',
    ];


    public function __construct(OregonIncomeTaxInformation $tax_information, Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_information = $tax_information;
    }
}
