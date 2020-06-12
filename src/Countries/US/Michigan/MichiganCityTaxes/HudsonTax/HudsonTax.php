<?php

namespace Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\HudsonTax;

use Appleton\Taxes\Countries\US\Michigan\MichiganCityTax;

abstract class HudsonTax extends MichiganCityTax
{
    private const CITY_NAME = 'Hudson';

    protected function getCityName(): string
    {
        return self::CITY_NAME;
    }
}