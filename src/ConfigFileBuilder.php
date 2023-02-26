<?php

namespace Deployer\WebsystemDeployer;

use Illuminate\Support\Arr;
use Deployer\WebsystemDeployer\ConfigFile;

class ConfigFileBuilder
{
    const DEFAULT_PHP_VERSION = '8.0';

    protected array $laravelHooks = [
        'artisan:storage:link',
        'artisan:view:clear',
        'artisan:config:cache',
    ];

    protected array $lumenHooks = [];

    protected array $configs = [
        'default' => 'basic',
        'strategies' => [],
        'hooks' => [
            'start' => [],
            'build' => [],
            'ready' => [],
            'done' => [],
            'success' => [],
            'fail' => [],
            'rollback' => [],
        ],
        'options' => [
            'application' => "env('APP_NAME', 'Laravel')",
        ],
        'hosts' => [
            'example.com' => [
                'deploy_path' => '/var/www/example.com',
                'user' => 'root',
            ]
        ],
        'localhost' => [],
        'include' => [],
        'custom_deployer_file' => false,
    ];

    public function __construct()
    {
        $basePath = base_path();
        $this->configs['options']['repository'] = exec("cd $basePath && git config --get remote.origin.url") ?: '';

        $lumen = preg_match('/Lumen/', app()->version());
        $hooks = $lumen ? $this->lumenHooks : $this->laravelHooks;
        $this->configs['hooks']['ready'] = $hooks;
    }

    public function get($key, $default = null): mixed
    {
        return Arr::get($this->configs, $key, $default);
    }

    public function set($key, $value): ConfigFileBuilder
    {
        Arr::set($this->configs, $key, $value);

        return $this;
    }

    public function add($key, $value): ConfigFileBuilder
    {
        $array = Arr::get($this->configs, $key);

        if (is_array($array)) {
            $array[] = $value;
            Arr::set($this->configs, $key, $array);
        }


        return $this;
    }

    public function getHost($key): mixed
    {
        return Arr::get(head($this->configs['hosts']), $key);
    }

    public function getHostname(): string
    {
        return array_search(head($this->configs['hosts']), $this->configs['hosts']);
    }

    public function setHost($key, $value): ConfigFileBuilder
    {
        $hostname = $this->getHostname();

        if ($key !== 'name') {
            $this->configs['hosts'][$hostname][$key] = $value;
            return $this;
        }

        if ($hostname === $value) {
            return $this;
        }

        $this->configs['hosts'][$value] = $this->configs['hosts'][$hostname];
        unset($this->configs['hosts'][$hostname]);
        $this->setHost('deploy_path', "/var/www/$value");

        return $this;
    }

    public function useForge($phpVersion = self::DEFAULT_PHP_VERSION): ConfigFileBuilder
    {
        $this->reloadFpm($phpVersion);
        $this->setHost('deploy_path', '/home/forge/' . $this->getHostname());
        $this->setHost('user', 'forge');

        return $this;
    }

    public function reloadFpm($phpVersion = self::DEFAULT_PHP_VERSION): ConfigFileBuilder
    {
        $this->add('hooks.done', 'fpm:reload');
        $this->add('hooks.rollback', 'fpm:reload');
        $this->set('options.php_fpm_service', "php$phpVersion-fpm");

        return $this;
    }

    public function build(): ConfigFile
    {
        return new ConfigFile($this->configs);
    }
}
