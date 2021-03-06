<?php

namespace Appleton\Taxes\Models\Countries\US\NewYork;

use Appleton\Taxes\Classes\WorkerTaxes\BaseTaxInformationModel;
use Appleton\Taxes\Countries\US\NewYork\NewYorkIncome\NewYorkIncome;

class NewYorkIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.new_york.new_york_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->ny_additional_withholding = 0;
        $tax_information->nyc_additional_withholding = 0;
        $tax_information->yonkers_additional_withholding = 0;
        $tax_information->ny_allowances = 0;
        $tax_information->nyc_allowances = 0;
        $tax_information->filing_status = NewYorkIncome::FILING_SINGLE;
        $tax_information->exempt = false;
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
        return NewYorkIncome::class;
    }
}
