<?php

namespace Zacksleo\EcSdk\Suning;

use Zacksleo\EcSdk\Kernel\ServiceContainer;

/**
 * 苏宁开放平台
 *
 * @property \Zacksleo\EcSdk\Contracts\Express\Codeable    $express
 * @property \Zacksleo\EcSdk\Suning\Order\Client      $order
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Express\ServiceProvider::class,
        Order\ServiceProvider::class,
    ];
}
