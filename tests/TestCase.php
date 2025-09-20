<?php

namespace Cyborgfinance\Fcaregisterlaravel\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider;

abstract class TestCase extends BaseTestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../vendor/orchestra/testbench-core/laravel/bootstrap/app.php';
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        
        return $app;
    }

    protected function getPackageProviders($app)
    {
        return [
            FcaregisterlaravelServiceProvider::class,
        ];
    }

    

    protected function getEnvironmentSetUp($app)
    {
        // Database config
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        
        // Setup FCA API config for tests
        $app['config']->set('fcaapi.email', env('FCA_EMAIL', 'test@example.com'));
        $app['config']->set('fcaapi.key', env('FCA_KEY', 'test-key'));
        $app['config']->set('fcaapi.api_url', 'https://register.fca.org.uk/services/');
        $app['config']->set('fcaapi.api_version', '0.1');
        $app['config']->set('fcaapi.api_timeout', 5);
        
        // Set live tests toggle (default to false)
        $app['config']->set('fcaapi.run_live_tests', env('RUN_LIVE_TESTS', false));
    }
}
