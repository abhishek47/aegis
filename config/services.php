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
        'client_id' => '838495330944-93rlvhsoqd4pvpo9s3ng9mdo478j83s8.apps.googleusercontent.com',
        'client_secret' => 'hBEJrzRVZIsq1thr5hDQU2Y9',
        'redirect' => 'https://aegisacademy.co.in/oauth/handle/google',
    ],

     'facebook' => [
        'client_id' => '707376409448239',
        'client_secret' => '9f5e7f5439172fc6bf3ae4f748518f01',
        'redirect' => 'https://aegisacademy.co.in/oauth/handle/facebook',
    ],

];
