<?php

namespace Appleton\Taxes\Countries\US\NorthDakota\NorthDakotaUnemployment;

use Appleton\Taxes\Classes\BaseStateUnemployment;
use Illuminate\Database\Eloquent\Collection;

class NorthDakotaUnemployment extends BaseStateUnemployment
{
    const TYPE = 'state';
    const WITHHELD = false;
}
