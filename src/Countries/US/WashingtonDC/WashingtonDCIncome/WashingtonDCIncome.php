<?php
namespace Appleton\Taxes\Countries\US\WashingtonDC\WashingtonDCIncome;

use Appleton\Taxes\Classes\BaseStateIncome;
use Appleton\Taxes\Classes\Payroll;
use Appleton\Taxes\Models\Countries\US\WashingtonDC\WashingtonDCIncomeTaxInformation;

abstract class WashingtonDCIncome extends BaseStateIncome
{
    const FILING_SINGLE = 'S';
    const FILING_MARRIED_FILING_JOINTLY = 'M';
    const FILING_MARRIED_FILING_SEPARATELY = 'N';
    const FILING_HEAD_OF_HOUSEHOLD = 'H';

    public function __construct(WashingtonDCIncomeTaxInformation $tax_information, Payroll $payroll)
    {
        parent::__construct($payroll);
        $this->tax_information = $tax_information;
    }
}
