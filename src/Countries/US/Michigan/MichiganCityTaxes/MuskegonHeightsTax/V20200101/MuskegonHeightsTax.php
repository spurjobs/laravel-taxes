<?php

namespace Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\MuskegonHeights\V20200101;

use Appleton\Taxes\Countries\US\Michigan\MuskegonHeights\MuskegonHeightsTax as BaseMuskegonHeightsTax;

class MuskegonHeightsTax extends BaseMuskegonHeightsTax
{
    public const RESIDENCY_TAX_RATE = 0.01;
    public const NONRESIDENCY_TAX_RATE = 0.005;
    public const EXEMPTION_AMOUNT = 600;


    protected function getResidencyTaxRate(): float
    {
        return self::RESIDENCY_TAX_RATE;
    }

    protected function getNonResidencyTaxRate(): float
    {
        return self::NONRESIDENCY_TAX_RATE;
    }

    protected function getExemptionAmount(): float
    {
        return self::EXEMPTION_AMOUNT;
    }
}