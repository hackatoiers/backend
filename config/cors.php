<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => explode(',', env('CORS_PATHS', 'api/*,sanctum/csrf-cookie')),

    'allowed_methods' => explode(',', env('CORS_ALLOWED_METHODS', '*')),

    'allowed_origins' => explode(',', env('CORS_ALLOWED_ORIGINS', 'localhost,http://localhost:3000,http://localhost:5173')),

    'allowed_origins_patterns' => explode(',', env('CORS_ALLOWED_ORIGINS_PATTERNS', '')),

    'allowed_headers' => explode(',', env('CORS_ALLOWED_HEADERS', '*')),

    'exposed_headers' => [],

    'max_age' => env('CORS_MAX_AGE', 0),

    'supports_credentials' => true,

];
