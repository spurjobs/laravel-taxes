<?php

namespace Appleton\Taxes\Countries\US\Virginia\VirginiaIncome;

use Appleton\Taxes\Classes\BaseStateIncome;
use Appleton\Taxes\Classes\Payroll;
use Appleton\Taxes\Models\Countries\US\Virginia\VirginiaIncomeTaxInformation;

abstract class VirginiaIncome extends BaseStateIncome
{
    public function __construct(VirginiaIncomeTaxInformation $tax_information, Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_information = $tax_information;
    }
}