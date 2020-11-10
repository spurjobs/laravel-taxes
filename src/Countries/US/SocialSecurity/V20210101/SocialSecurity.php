<?php

namespace Appleton\Taxes\Countries\US\SocialSecurity\V20210101;

use Appleton\Taxes\Countries\US\SocialSecurity\SocialSecurity as BaseSocialSecurity;

class SocialSecurity extends BaseSocialSecurity
{
    public const TAX_RATE = 0.062;
    public const WAGE_BASE = 142800;
}
