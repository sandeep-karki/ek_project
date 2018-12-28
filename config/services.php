<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => '1512199448800868',
        'client_secret' => '5c9216ac4defd11ec828855b5534708a',
        'redirect'      => 'http://127.0.0.1:8000/',
    ],

    'google' => [
        'client_id'     => '228174346205-m3gllru6ockvv6mg5g1lre46v9jn2id8.apps.googleusercontent.com',
        'client_secret' => 'z_BO9cdtoiW8jFkpzb1GxbMn',
        'redirect'      => 'http://127.0.0.1:8000/login/callback/google',
    ]

];
