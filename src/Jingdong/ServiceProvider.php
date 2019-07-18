<?php
/*
 * This file is part of the zacksleo/ec-sdk.
 *
 * (c) zacksleo <zacksleo@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zacksleo\EcSdk\Jingdong;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        ! isset($app['express']) && $app['express'] = function ($app) {
            return new Express($app);
        };
        ! isset($app['auth']) && $app['auth'] = function ($app) {
            return new Client($app);
        };
    }
}
