<?php

namespace Appleton\Taxes\Models\Countries\US\Montana;

use Appleton\Taxes\Classes\WorkerTaxes\BaseTaxInformationModel;
use Appleton\Taxes\Countries\US\Montana\MontanaIncome\MontanaIncome;

class MontanaIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.montana.montana_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->additional_withholding = 0;
        $tax_information->allowances = 0;
        $tax_information->exempt = false;
        return $tax_information;
    }

    public static function getTax()
    {
        return MontanaIncome::class;
    }
}
