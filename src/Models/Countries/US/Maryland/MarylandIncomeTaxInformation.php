<?php

namespace Appleton\Taxes\Models\Countries\US\Maryland;

use Appleton\Taxes\Classes\BaseTaxInformationModel;
use Appleton\Taxes\Countries\US\Maryland\MarylandIncome\MarylandIncome;

class MarylandIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.maryland.maryland_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->dependents = 0;
        $tax_information->filing_status = MarylandIncome::FILING_SINGLE;
        $tax_information->exempt = false;
        return $tax_information;
    }
}