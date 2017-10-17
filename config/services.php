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

    'google' => [
        'client_id' => '1091295445996-6vcjmauaq43nmvier9gbmaqj3odno3nl.apps.googleusercontent.com',
        'client_secret' => 'QOuCjrsw6pr8QfY4PAC21VQo',
        'redirect' => 'https://aegisacademy.co.in/oauth/handle/google',
    ],

     'facebook' => [
        'client_id' => '707376409448239',
        'client_secret' => '9f5e7f5439172fc6bf3ae4f748518f01',
        'redirect' => 'https://aegisacademy.co.in/oauth/handle/facebook',
    ],

];
