<?php

namespace Deployer\WebsystemDeployer\Commands;

use Deployer\WebsystemDeployer\Commands\BaseCommand;

class DeployCurrent extends BaseCommand
{
    protected $signature = 'deploy:current {stage? : Stage or hostname}';
    
    protected $description = 'Show current paths';

    public function handle()
    {
        return $this->dep('config:current');
    }
}
