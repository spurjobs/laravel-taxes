<?php

namespace Appleton\Taxes\Models\Countries\US\Iowa;

use Appleton\Taxes\Classes\WorkerTaxes\BaseTaxInformationModel;

class IowaIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.iowa.iowa_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->allowances = 0;
        $tax_information->exempt = false;
        return $tax_information;
    }

    public static function getTax()
    {
        return IowaIncome::class;
    }
}
