<?php

namespace Deployer\WebsystemDeployer;

use Deployer\WebsystemDeployer\Commands\Deploy;
use Deployer\WebsystemDeployer\Commands\DeployConfigs;
use Deployer\WebsystemDeployer\Commands\DeployCurrent;
use Deployer\WebsystemDeployer\Commands\DeployDump;
use Deployer\WebsystemDeployer\Commands\DeployHosts;
use Deployer\WebsystemDeployer\Commands\DeployInit;
use Deployer\WebsystemDeployer\Commands\DeployList;
use Deployer\WebsystemDeployer\Commands\DeployRollback;
use Deployer\WebsystemDeployer\Commands\DeployRun;
use Deployer\WebsystemDeployer\Commands\Logs;
use Deployer\WebsystemDeployer\Commands\Ssh;
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
                DeployCurrent::class,
                DeployDump::class,
                DeployHosts::class,
                DeployInit::class,
                DeployList::class,
                DeployRollback::class,
                DeployRun::class,
                Logs::class,
                Ssh::class,
            ]);
    }
}
