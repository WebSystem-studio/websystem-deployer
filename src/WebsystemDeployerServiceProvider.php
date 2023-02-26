<?php

namespace Deployer\WebsystemDeployer;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Deployer\WebsystemDeployer\Commands\WebsystemDeployerCommand;

class WebsystemDeployerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('websystem-deployer')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_websystem-deployer_table')
            ->hasCommand(WebsystemDeployerCommand::class);
    }
}
