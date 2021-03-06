<?php

namespace Appleton\Taxes\Models\Countries\US\Michigan;

use Appleton\Taxes\Classes\WorkerTaxes\BaseTaxInformationModel;
use Appleton\Taxes\Countries\US\Michigan\MichiganIncome\MichiganIncome;

class MichiganIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.michigan.michigan_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->dependents = 0;
        $tax_information->filing_status = MichiganIncome::FILING_SINGLE;
        $tax_information->exempt = false;
        $tax_information->additional_withholding = 0;
        $tax_information->resident_city = '';
        $tax_information->nonresident_city1 = '';
        $tax_information->nonresident_city2 = '';
        $tax_information->nonresident_city1_percentage_worked = 0;
        $tax_information->nonresident_city2_percentage_worked = 0;
        $tax_information->resident_exemptions = 0;
        $tax_information->nonresident_exemptions = 0;

        return $tax_information;
    }

    public function getAdditionalWithholding($value)
    {
        return $value * 100;
    }

    public function setAdditionalWithholding($value)
    {
        $this->attributes['additional_withholding'] = round($value / 100);
    }

    public static function getTax()
    {
        return MichiganIncome::class;
    }
}
