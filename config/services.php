<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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
        'client_id' => '1017919781652254',
        'client_secret' => '59cad7b4f42ba65c6f8dc3475fc69855',
        'redirect' => 'http://localhost/testingslug/public/auth/facebook/callback',
     ],

     'google' => [
        'client_id' => '585649264039-4i8b96uvuglm1ve8qp1l5s0f5dbf7foe.apps.googleusercontent.com',
        'client_secret' => 'ST3a1Rz7cjTbPOaQqNt-nCb9',
        'redirect' => 'http://localhost/testingslug/public/auth/callback/google',
    ],

];
