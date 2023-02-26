<?php

namespace Deployer\WebsystemDeployer\Commands;

class Deploy extends BaseCommand
{
    protected $signature = 'deploy {stage? : Stage or hostname}';

    protected $description = 'Deploy your application';

    public function handle()
    {
        return $this->dep('deploy');
    }
}
