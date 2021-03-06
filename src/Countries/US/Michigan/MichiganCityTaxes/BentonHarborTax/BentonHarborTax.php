<?php

namespace Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\BentonHarborTax;

use Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\MichiganCityTax;

abstract class BentonHarborTax extends MichiganCityTax
{
    private const CITY_NAME = 'BentonHarbor';

    protected static function getCityName(): string
    {
        return self::CITY_NAME;
    }
}
