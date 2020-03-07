<?php

namespace Appleton\Taxes\Models\Countries\US\Missouri;

use Appleton\Taxes\Classes\WorkerTaxes\BaseTaxInformationModel;
use Appleton\Taxes\Countries\US\Missouri\MissouriIncome\MissouriIncome;

class MissouriIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.missouri.missouri_income_tax_information';
    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->allowances = 0;
        $tax_information->additional_withholding = 0;
        $tax_information->use_reduced_withholding = false;
        $tax_information->reduced_withholding = 0;
        $tax_information->exempt = false;
        $tax_information->filing_status = MissouriIncome::FILING_SINGLE;
        return $tax_information;
    }

    public static function getTax()
    {
        return MissouriIncome::class;
    }
}
