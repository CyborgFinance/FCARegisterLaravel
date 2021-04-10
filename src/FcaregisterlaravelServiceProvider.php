<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
//use Cyborgfinance\Fcaregisterlaravel\Commands\FcaregisterlaravelCommand;

class FcaregisterlaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('fcaapi')->hasConfigFile();
    }
}
