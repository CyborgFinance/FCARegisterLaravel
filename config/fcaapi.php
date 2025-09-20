<?php

// FCA API (fcaapi) Configuration

return [
  'email' => env('FCA_EMAIL', 'your@email.com'), // FCA API Email Address
  'key' => env('FCA_KEY', 'YOUR_FCA_API_KEY'), // FCA API KEY
  'run_live_tests' => env('RUN_LIVE_TESTS', false), // Enable live API tests
  'api_version' => '0.1', // FCA API VERSION
  'api_url' => 'https://register.fca.org.uk/services/', // FCA API URL
  'api_timeout' => 5, // FCA API TIMEOUT in seconds
];
