<?php

namespace Appleton\Taxes\Countries\US\NorthCarolina\NorthCarolinaIncome;

use Appleton\Taxes\Classes\BaseStateIncome;

abstract class NorthCarolinaIncome extends BaseStateIncome
{
    const FILING_SINGLE = 1;
    const FILING_HEAD_OF_HOUSEHOLD = 2;
    const FILING_MARRIED = 3;
    const FILING_SEPARATE = 4;

    const FILING_STATUSES = [
        self::FILING_SINGLE => 'FILING_SINGLE',
        self::FILING_HEAD_OF_HOUSEHOLD => 'FILING_HEAD_OF_HOUSEHOLD',
        self::FILING_MARRIED => 'FILING_MARRIED',
        self::FILING_SEPARATE => 'FILING_SEPARATE',
    ];
}
