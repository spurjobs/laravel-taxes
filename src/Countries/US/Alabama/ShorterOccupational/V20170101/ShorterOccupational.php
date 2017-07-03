<?php

namespace Appleton\Taxes\Countries\US\Alabama\ShorterOccupational\V20170101;

use Appleton\Taxes\Classes\BaseTax;

class ShorterOccupational extends BaseTax
{
    const TYPE = 'local';
    const WITHHELD = true;

    const TAX_RATE = 0.01;
}