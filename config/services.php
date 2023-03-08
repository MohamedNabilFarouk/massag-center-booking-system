<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'facebook' => [
        'client_id' => '718383962278297',
        'client_secret' => '08a193caf6292f503a75651c2ccc46e6',
        'redirect' => 'http://spa.alefsoftware.com/login/facebook/callback',
    ],


    'google' => [
        'client_id' => '863706630204-koub5r95rdf89vqapmuo4q2ot6ph4668.apps.googleusercontent.com',
        'client_secret' => 'OxgPAcRlvsNjLgZBIa9c1Mt4',
        'redirect' => 'http://spa.alefsoftware.com/login/google/callback',
    ],

];
