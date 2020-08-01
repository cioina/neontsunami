<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route Prefixes
    |--------------------------------------------------------------------------
    |
    | This prefix method can be used for the prefix of each
    | route in the administration panel. For example, you can change to 'admin'
    |
     */

    'prefix' => env('DASHBOARD_PREFIX', getenv('DASHBOARD_PREFIX')),
 
];
