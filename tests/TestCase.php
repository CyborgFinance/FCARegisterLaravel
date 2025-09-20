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

    

    protected function setUp(): void
    {
        parent::setUp();
        
        // Load the package config file directly
        $configPath = __DIR__ . '/../config/fcaapi.php';
        
        if (file_exists($configPath)) {
            $packageConfig = require $configPath;
            config()->set('fcaapi', $packageConfig);
        } else {
            // Fallback config if file doesn't exist
            config()->set('fcaapi', [
                'email' => 'test@example.com',
                'key' => 'test-key',
                'api_url' => 'https://register.fca.org.uk/services/',
                'api_version' => '0.1',
                'api_timeout' => 5,
                'run_live_tests' => false,
            ]);
        }
        
        // Override with environment variables
        config()->set('fcaapi.email', env('FCA_EMAIL', config('fcaapi.email')));
        config()->set('fcaapi.key', env('FCA_KEY', config('fcaapi.key')));
        
        // Set live tests toggle with proper boolean conversion
        $runLiveTests = env('RUN_LIVE_TESTS', config('fcaapi.run_live_tests'));
        if (is_string($runLiveTests)) {
            $runLiveTests = strtolower($runLiveTests) === 'true' || $runLiveTests === '1';
        }
        config()->set('fcaapi.run_live_tests', (bool) $runLiveTests);
    }
}
