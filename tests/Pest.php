<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// Load .env file for tests
if (file_exists(dirname(__DIR__).'/.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
}

uses(Cyborgfinance\Fcaregisterlaravel\Tests\TestCase::class)
    ->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectation methods" you can use
| to assert different things on the values of your tests.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function setupFcaApiConfig()
{
    config([
        'fcaapi.email' => 'test@example.com',
        'fcaapi.key' => 'test-key',
        'fcaapi.api_url' => 'https://register.fca.org.uk/services/',
        'fcaapi.api_version' => '0.1',
        'fcaapi.api_timeout' => 5,
    ]);
}
