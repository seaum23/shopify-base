<?php

return [
    'api_key' => env('SHOPIFY_API_KEY'),
    'api_secret' => env('SHOPIFY_API_SECRET'),
    'api_scopes' => env('SHOPIFY_API_SCOPES'),
    'api_version' => env('SHOPIFY_API_VERSION', '2023-04')
];