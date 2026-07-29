<?php

return [

    /*
    |--------------------------------------------------------------------------
    | USD to PHP Exchange Rate
    |--------------------------------------------------------------------------
    |
    | Used to convert USD donation amounts to PHP for GCash and bank payments.
    |
    */

    'usd_to_php' => (float) env('DONATION_USD_TO_PHP', 58.00),

    /*
    |--------------------------------------------------------------------------
    | Default Platform Fee (USD)
    |--------------------------------------------------------------------------
    */

    'default_platform_fee_usd' => 1.88,

    /*
    |--------------------------------------------------------------------------
    | Supported Banks (online banking via PayMongo)
    |--------------------------------------------------------------------------
    */

    'banks' => [
        'BPI',
        'UnionBank',
        'BDO',
        'Metrobank',
        'Landbank',
    ],

];
