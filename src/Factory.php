<?php

namespace Zacksleo\EcSdk;

/**
 * Class Factory.
 *
 * @method static \Zacksleo\EcSdk\Jingdong\Application     jingdong(array $config)
 * @method static \Zacksleo\EcSdk\Suning\Application       suning(array $config)
 * @method static \Zacksleo\EcSdk\Taobao\Application       taobao(array $config)
 */
class Factory
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return \Zacksleo\EcSdk\Kernel\ServiceContainer
     */
    public static function make($name, array $config)
    {
        $namespace = ucfirst($name);
        $application = "\\App\\Ecs\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
