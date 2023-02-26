<?php

namespace Deployer\WebsystemDeployer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Deployer\WebsystemDeployer\WebsystemDeployer
 */
class WebsystemDeployer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Deployer\WebsystemDeployer\WebsystemDeployer::class;
    }
}
