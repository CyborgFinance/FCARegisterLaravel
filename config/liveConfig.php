<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Live Test Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration for running live tests against the FCA API.
    | Copy this to your .env file and fill in your actual API credentials.
    |
    */

    // FCA API Credentials (required for live tests)
    'FCA_EMAIL' => env('FCA_EMAIL', 'your@email.com'),
    'FCA_KEY' => env('FCA_KEY', 'YOUR_FCA_API_KEY'),

    // Test FRN numbers (known valid FCA firms)
    'test_frns' => [
        'cyborg' => '919921',        // Cyborg Finance Limited
        'barclays' => '106054',     // Barclays Bank UK PLC
        'natwest' => '121878',      // National Westminster Bank plc
    ],

    // Test search terms
    'search_terms' => [
        'bank',
        'insurance',
        'investment',
        'mortgage',
    ],

    // Rate limiting configuration for tests
    'rate_limit' => [
        'requests_per_second' => 1,
        'burst_limit' => 5,
    ],
];
