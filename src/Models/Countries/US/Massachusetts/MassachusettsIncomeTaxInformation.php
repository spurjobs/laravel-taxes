<?php

namespace Appleton\Taxes\Models\Countries\US\Massachusetts;

use Appleton\Taxes\Countries\US\Massachusetts\MassachusettsIncome\MassachusettsIncome;
use Appleton\Taxes\Classes\BaseTaxInformationModel;

class MassachusettsIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.massachusetts.massachusetts_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->additional_withholding = 0;
        $tax_information->exemptions = 0;
        $tax_information->filing_status = MassachusettsIncome::FILING_SINGLE;
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
        return MassachusettsIncome::class;
    }
}
