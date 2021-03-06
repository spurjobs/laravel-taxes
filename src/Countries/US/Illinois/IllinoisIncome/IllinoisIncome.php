<?php

namespace Appleton\Taxes\Countries\US\Illinois\IllinoisIncome;

use Appleton\Taxes\Classes\WorkerTaxes\Payroll;
use Appleton\Taxes\Classes\WorkerTaxes\Taxes\BaseStateIncome;
use Appleton\Taxes\Models\Countries\US\Illinois\IllinoisIncomeTaxInformation;

abstract class IllinoisIncome extends BaseStateIncome
{
    public function __construct(IllinoisIncomeTaxInformation $tax_information, Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_information = $tax_information;
    }
}
