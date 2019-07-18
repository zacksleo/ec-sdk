<?php

namespace Zacksleo\EcSdk\Kernel;

use Pimple\Container;

/**
 * Class ServiceContainer.
 *
 * @author zacksleo <zacksleo@gmail.com>
 *
 * @property array                                     $config
 * @property \Symfony\Component\HttpFoundation\Request $request
 * @property \GuzzleHttp\Client                        $http_client
 * @property \Monolog\Logger                           $logger
 */
class ServiceContainer extends Container
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var array
     */
    protected $providers = [];
    /**
     * @var array
     */
    protected $defaultConfig = [];
    /**
     * @var array
     */
    protected $userConfig = [];

    public function __construct($config)
    {
        parent::__construct();
        $this->setConfig($config);
        $this->registerProviders();
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function getConfig($key = null)
    {
        return $key ? $this->config[$key] : $this->config;
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * Register providers.
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }
}
