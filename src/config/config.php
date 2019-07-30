<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User Model Class
    |--------------------------------------------------------------------------
    |
    | Specify the full path to your User model.
    |
    */

    'user' => \Illuminate\Foundation\Auth\User::class,

    /*
    |--------------------------------------------------------------------------
    | Table Names
    |--------------------------------------------------------------------------
    |
    | Specify the names to be used for database tables here or in the env.
    |
    */

    'tables' => [
        'governmental_unit_areas' => env('TAXES_GOVERNMENTAL_UNIT_AREAS', 'governmental_unit_areas'),

        'tax_areas' => env('TAXES_TAX_AREAS', 'tax_areas'),

        'tax_information' => env('TAXES_TAX_INFORMATION', 'tax_information'),

        'us' => [
            'federal_income_tax_information' => env('TAXES_FEDERAL_INCOME_TAX_INFORMATION', 'federal_income_tax_information'),

            'alabama' => [
                'alabama_income_tax_information' => env('TAXES_ALABAMA_INCOME_TAX_INFORMATION', 'alabama_income_tax_information'),
            ],

            'california' => [
                'california_income_tax_information' => env('TAXES_CALIFORNIA_INCOME_TAX_INFORMATION', 'california_income_tax_information'),
            ],

            'colorado' => [
                'colorado_income_tax_information' => env('TAXES_COLORADO_INCOME_TAX_INFORMATION', 'colorado_income_tax_information'),
            ],

            'georgia' => [
                'georgia_income_tax_information' => env('TAXES_GEORGIA_INCOME_TAX_INFORMATION', 'georgia_income_tax_information'),
            ],

            'louisiana' => [
                'louisiana_income_tax_information' => env('TAXES_LOUISIANA_INCOME_TAX_INFORMATION', 'louisiana_income_tax_information'),
            ],

            'maryland' => [
                'maryland_income_tax_information' => env('TAXES_MARYLAND_INCOME_TAX_INFORMATION', 'maryland_income_tax_information'),
            ],

            'michigan' => [
                'michigan_income_tax_information' => env('TAXES_MICHIGAN_INCOME_TAX_INFORMATION', 'michigan_income_tax_information'),
            ],

            'mississippi' => [
                'mississippi_income_tax_information' => env('TAXES_MISSISSIPPI_INCOME_TAX_INFORMATION', 'mississippi_income_tax_information'),
            ],

            'new_jersey' => [
                'new_jersey_income_tax_information' => env('TAXES_NEW_JERSEY_INCOME_TAX_INFORMATION', 'new_jersey_income_tax_information'),
            ],

            'new_mexico' => [
                'new_mexico_income_tax_information' => env('TAXES_NEW_MEXICO_INCOME_TAX_INFORMATION', 'new_mexico_income_tax_information'),
            ],

            'north_carolina' => [
                'north_carolina_income_tax_information' => env('TAXES_NORTH_CAROLINA_INCOME_TAX_INFORMATION', 'north_carolina_income_tax_information'),
            ],

            'ohio' => [
                'ohio_income_tax_information' => env('TAXES_OHIO_INCOME_TAX_INFORMATION', 'ohio_income_tax_information'),
            ],

            'oklahoma' => [
                'oklahoma_income_tax_information' => env('TAXES_OKLAHOMA_INCOME_TAX_INFORMATION', 'oklahoma_income_tax_information'),
            ],

            'pennsylvania' => [
                'pennsylvania_income_tax_information' => env('TAXES_PENNSYLVANIA_INCOME_TAX_INFORMATION', 'pennsylvania_income_tax_information'),
            ],

            'washingtondc' => [
                'washingtondc_income_tax_information' => env('TAXES_WASHINGTONDC_INCOME_TAX_INFORMATION', 'washingtondc_income_tax_information'),
            ],

            'west_virginia' => [
                'west_virginia_income_tax_information' => env('TAXES_WEST_VIRGINIA_INCOME_TAX_INFORMATION', 'west_virginia_income_tax_information'),
            ],

            'wisconsin' => [
                'wisconsin_income_tax_information' => env('TAXES_WISCONSIN_INCOME_TAX_INFORMATION', 'wisconsin_income_tax_information'),
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Rates
    |--------------------------------------------------------------------------
    |
    | Specify the rate to be used for taxes here or in the env.
    |
    */

    'rates' => [
        'us' => [
            'alabama' => [
                'unemployment' => env('TAXES_ALABAMA_UNEMPLOYMENT_TAX_RATE', 0.027),
            ],

            'california' => [
                'unemployment' => env('TAXES_CALIFORNIA_UNEMPLOYMENT_TAX_RATE', 0.034),
            ],

            'colorado' => [
                'unemployment' => env('TAXES_COLORADO_UNEMPLOYMENT_TAX_RATE', 0.017),
            ],

            'georgia' => [
                'unemployment' => env('TAXES_GEORGIA_UNEMPLOYMENT_TAX_RATE', 0.027),
            ],

            'louisiana' => [
                'unemployment' => env('TAXES_LOUISIANA_UNEMPLOYMENT_TAX_RATE', 0.03),
            ],

            'maryland' => [
                'unemployment' => env('TAXES_MARYLAND_UNEMPLOYMENT_TAX_RATE', 0.026),
            ],

            'mississippi' => [
                'unemployment' => env('TAXES_MISSISSIPPI_UNEMPLOYMENT_TAX_RATE', 0.012),
            ],

            'new_jersey' => [
                'unemployment' => env('TAXES_NEW_JERSEY_UNEMPLOYMENT_TAX_RATE', 0.028),
            ],

            'new_mexico' => [
                'unemployment' => env('TAXES_NEW_MEXICO_UNEMPLOYMENT_TAX_RATE', 0.01),
            ],

            'nevada' => [
                'unemployment' => env('TAXES_NEVADA_UNEMPLOYMENT_TAX_RATE', 0.03),
            ],

            'north_carolina' => [
                'unemployment' => env('TAXES_NORTH_CAROLINA_UNEMPLOYMENT_TAX_RATE', 0.01),
            ],

            'ohio' => [
                'unemployment' => env('TAXES_OHIO_UNEMPLOYMENT_TAX_RATE', 0.027),
            ],

            'oklahoma' => [
                'unemployment' => env('TAXES_OKLAHOMA_UNEMPLOYMENT_TAX_RATE', 0.015),
            ],

            'pennsylvania' => [
                'unemployment' => env('TAXES_PENNSYLVANIA_UNEMPLOYMENT_TAX_RATE', 0.03689),
            ],

            'washingtondc' => [
                'unemployment' => env('TAXES_WASHINGTONDC_UNEMPLOYMENT_TAX_RATE', 0.027),
            ],

            'west_virginia' => [
                'unemployment' => env('TAXES_WEST_VIRGINIA_UNEMPLOYMENT_TAX_RATE', 0.027),
            ],

            'wisconsin' => [
                'unemployment' => env('TAXES_WISCONSIN_UNEMPLOYMENT_TAX_RATE', 0.0305),
            ],
        ],
    ],
];
