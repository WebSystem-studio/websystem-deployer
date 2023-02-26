<?php

namespace Deployer\WebsystemDeployer;

use Spatie\LaravelPackageTools\Package;
use Deployer\WebsystemDeployer\Commands\Deploy;
use Deployer\WebsystemDeployer\Commands\DeployDump;
use Deployer\WebsystemDeployer\Commands\DeployConfigs;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WebsystemDeployerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('websystem-deployer')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_websystem-deployer_table')
            ->hasCommands([
                Deploy::class,
                DeployConfigs::class,
                DeployDump::class,
            ]);
    }
}
