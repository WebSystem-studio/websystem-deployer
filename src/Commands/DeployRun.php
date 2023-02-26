<?php

namespace Deployer\WebsystemDeployer\Commands;

class DeployRun extends BaseCommand
{
    protected $signature = 'deploy:run {task : The task to execute} {stage? : Stage or hostname}';

    protected $description = 'Execute a given task on your hosts';

    public function handle()
    {
        return $this->dep('');
    }
}
