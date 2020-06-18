<?php

namespace Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\SaginawTax;

use Appleton\Taxes\Countries\US\Michigan\MichiganCityTaxes\MichiganCityTax;

abstract class SaginawTax extends MichiganCityTax
{
    private const CITY_NAME = 'Saginaw';

    protected $special_city = true;

    protected function getCityName(): string
    {
        return self::CITY_NAME;
    }
}
