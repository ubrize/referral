<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Name
    |--------------------------------------------------------------------------
    |
    | The name of the database table that will hold UTM data
    |
    */
    'visits_table_name' => 'referral_visits',

    /*
    |--------------------------------------------------------------------------
    | Conversion Table Name
    |--------------------------------------------------------------------------
    |
    | The name of the database table that will hold
    | visit -> conversion relation data
    |
    */
    'conversions_table_name' => 'referral_conversions',

    /*
    |--------------------------------------------------------------------------
    | Cookie Name
    |--------------------------------------------------------------------------
    |
    | The name of the cookie that is set to keep track of attributions.
    |
    */
    'cookie_name' => 'referrals',

    /*
    |--------------------------------------------------------------------------
    | Attribution Duration
    |--------------------------------------------------------------------------
    |
    | How long since the initial visit should an attribution last for.
    |
    */
    'attribution_duration' => 2628000,
    
    /*
    |--------------------------------------------------------------------------
    | Custom tracking parameter
    |--------------------------------------------------------------------------
    |
    |
    */
    'custom_parameters' => [],
    
    /*
    |--------------------------------------------------------------------------
    | Tracking settings
    |--------------------------------------------------------------------------
    |
    |
    */
    'disable_internal_links' => true,

    /*
    |--------------------------------------------------------------------------
    | Disable Routes
    |--------------------------------------------------------------------------
    |
    |
    */
    'landing_page_blacklist' => [
        'genealabs/laravel-caffeine/drip'
    ],

    /*
    |--------------------------------------------------------------------------
    | Cookie domain
    |--------------------------------------------------------------------------
    |
    | If you want to use with more subdomain
    | you have to set this to .yourdomain.com
    |
    */
    'cookie_domain' => config('session.domain'),

    /*
    |--------------------------------------------------------------------------
    | Async
    |--------------------------------------------------------------------------
    |
    | This function will use the Laravel queue.
    | Make sure your setup is correct.
    |
    */
    'async' => false,
];
