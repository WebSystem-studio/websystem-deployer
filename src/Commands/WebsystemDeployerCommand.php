<?php

namespace Deployer\WebsystemDeployer\Commands;

use Illuminate\Console\Command;

class WebsystemDeployerCommand extends Command
{
    public $signature = 'websystem-deployer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
