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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'n8n' => [
        'base_url' => env('N8N_BASE_URL', 'http://n8n:5678'),
        'webhook_path' => env('N8N_WEBHOOK_PATH', '/webhook-test/ai-ad-refactor'),
        'hmac_secret' => env('N8N_HMAC_SECRET', 'bcbbaa855511e5d12a89a63e6a6685968052816f09df5f42cb8dea5d10e4dbf2'),
    ]

];
