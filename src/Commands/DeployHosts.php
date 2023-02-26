<?php

namespace Deployer\WebsystemDeployer\Commands;

class DeployHosts extends BaseCommand
{
    protected $signature = 'deploy:hosts {stage? : Stage or hostname}';

    protected $description = 'Print all hosts';

    public function handle()
    {
        return $this->dep('config:hosts');
    }
}
