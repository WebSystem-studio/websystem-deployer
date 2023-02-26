<?php

namespace Deployer\WebsystemDeployer;

use Deployer\WebsystemDeployer\Commands\WebsystemDeployerCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
