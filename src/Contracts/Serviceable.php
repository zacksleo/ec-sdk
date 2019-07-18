<?php

namespace Zacksleo\EcSdk\Contracts;

use Zacksleo\EcSdk\Kernel\ServiceContainer;

/**
 * 电商平台抽象
 */
abstract class Serviceable extends ServiceContainer
{
    /**
     * 物流操作
     *
     * @var \App\Contracts\Ecs\WithExpress
     */
    public $express;

    /**
     * 订单操作
     *
     * @var [type]
     */
    public $order;
}
