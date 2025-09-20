<?php

namespace Cyborgfinance\Fcaregisterlaravel\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            FcaregisterlaravelServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        
        // Load .env file if it exists
        if (file_exists(dirname(__DIR__, 2) . '/.env')) {
            $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
            $dotenv->load();
        }
        
        // Load live test configuration if available
        if (file_exists(dirname(__DIR__) . '/config/liveConfig.php')) {
            $liveConfig = require dirname(__DIR__) . '/config/liveConfig.php';
        }
        
        // Setup FCA API config for tests
        $app['config']->set('fcaapi.email', env('FCA_EMAIL', 'test@example.com'));
        $app['config']->set('fcaapi.key', env('FCA_KEY', 'test-key'));
        $app['config']->set('fcaapi.api_url', 'https://register.fca.org.uk/services/');
        $app['config']->set('fcaapi.api_version', '0.1');
        $app['config']->set('fcaapi.api_timeout', 5);
        
        // Set live tests toggle (default to false)
        $app['config']->set('fcaapi.run_live_tests', env('RUN_LIVE_TESTS', false));
        
        // Load live test FRNs if available
        if (isset($liveConfig['test_frns'])) {
            $app['config']->set('fcaapi.test_frns', $liveConfig['test_frns']);
        }
    }
}
