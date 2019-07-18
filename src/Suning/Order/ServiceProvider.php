<?php
/*
 * This file is part of the zacksleo/ec-sdk.
 *
 * (c) zacksleo <zacksleo@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zacksleo\EcSdk\Suning\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        ! isset($app['order']) && $app['order'] = function ($app) {
            return new Order($app);
        };
    }
}
