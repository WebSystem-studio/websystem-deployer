<?php

namespace Deployer\WebsystemDeployer;

use Deployer\WebsystemDeployer\Commands\Deploy;
use Deployer\WebsystemDeployer\Commands\DeployConfigs;
use Deployer\WebsystemDeployer\Commands\DeployDump;
use Spatie\LaravelPackageTools\Package;
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
