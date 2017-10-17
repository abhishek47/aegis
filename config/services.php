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
        'client_id' => '35617699424-gt470osfvk8ujhei641mlh3ahpval6qu.apps.googleusercontent.com',
        'client_secret' => '8_cc6YTTX0oE4eDTMH7tJSTf',
        'redirect' => 'https://tdrive.dev/oauth/handle/google',
    ],

     'facebook' => [
        'client_id' => '707376409448239',
        'client_secret' => '9f5e7f5439172fc6bf3ae4f748518f01',
        'redirect' => 'https://tdrive.dev/oauth/handle/facebook',
    ],

];
