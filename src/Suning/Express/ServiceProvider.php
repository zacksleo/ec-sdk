<?php

namespace Zacksleo\EcSdk\Suning\Express;

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
            return new Client($app);
        };
    }
}
