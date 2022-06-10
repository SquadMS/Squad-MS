<?php

return [
    'admins' => explode(',', env('SQMS_SUPER_ADMINS', '76561198049578741')),

    'auth' => [
        'redirect' => 0, // 0 = Redirect Home, 1 = Redirect previous page, 3 = Redirect Profile

        'controller' => \SquadMS\Foundation\Auth\Http\Controllers\SteamLoginController::class,

        'api_key' => env('STEAM_API_KEY'),

        /*
         * Method of retrieving player's profile data.
         * Valid options: xml, api
         */
        'method'  => env('STEAM_LOGIN_PROFILE_DATA_METHOD', env('STEAM_LOGIN_PROFILE_METHOD', 'api')),

        'timeout' => env('STEAM_LOGIN_TIMEOUT', 5),
    ],
];