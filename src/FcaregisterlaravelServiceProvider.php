<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FcaregisterlaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('fcaapi')
            ->hasConfigFile()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('cyborgfinance/fcaregisterlaravel');
            });
    }

    public function register()
    {
        parent::register();

        // Ensure config is merged even in test environment
        $this->mergeConfigFrom(
            __DIR__.'/../config/fcaapi.php',
            'fcaapi'
        );
    }
}
