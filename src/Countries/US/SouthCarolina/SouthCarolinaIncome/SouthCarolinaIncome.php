<?php
namespace Appleton\Taxes\Countries\US\SouthCarolina\SouthCarolinaIncome;

use Appleton\Taxes\Classes\WorkerTaxes\Payroll;
use Appleton\Taxes\Classes\WorkerTaxes\Taxes\BaseStateIncome;
use Appleton\Taxes\Models\Countries\US\SouthCarolina\SouthCarolinaIncomeTaxInformation;

abstract class SouthCarolinaIncome extends BaseStateIncome
{
    public function __construct(SouthCarolinaIncomeTaxInformation $tax_information, Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_information = $tax_information;
    }
}
