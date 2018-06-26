<?php

namespace Appleton\Taxes\Models\Countries\US\Wisconsin;

use Appleton\Taxes\Countries\US\Wisconsin\WisconsinIncome\WisconsinIncome;
use Appleton\Taxes\Classes\BaseTaxInformationModel;

class WisconsinIncomeTaxInformation extends BaseTaxInformationModel
{
    protected $config_name = 'taxes.tables.us.wisconsin.wisconsin_income_tax_information';

    public static function getDefault()
    {
        $tax_information = new self();
        $tax_information->filing_status = WisconsinIncome::FILING_SINGLE;
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
        return WisconsinIncome::class;
    }
}
