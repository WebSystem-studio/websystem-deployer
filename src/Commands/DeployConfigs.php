<?php

namespace Deployer\WebsystemDeployer\Commands;

use Deployer\WebsystemDeployer\Commands\BaseCommand;

class DeployConfigs extends BaseCommand
{
    protected $signature = 'deploy:configs {stage? : Stage or hostname}';
    
    protected $description = 'Print host configuration';

    public function handle()
    {
        return $this->dep('config:dump');
    }
}
