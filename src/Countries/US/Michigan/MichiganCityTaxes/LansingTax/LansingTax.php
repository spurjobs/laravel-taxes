<?php

namespace Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\LansingTax;

use Appleton\Taxes\Countries\US\Michigan\MichiganCityTax;

abstract class LansingTax extends MichiganCityTax
{
    private const CITY_NAME = 'Lansing';

    protected function getCityName(): string
    {
        return self::CITY_NAME;
    }
}