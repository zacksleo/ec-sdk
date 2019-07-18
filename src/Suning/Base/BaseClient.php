<?php

namespace Zacksleo\EcSdk\Suning\Base;

use Zacksleo\SuningSdk\Suning;
use Zacksleo\EcSdk\Kernel\ServiceContainer;

/**
 * Class BaseClient.
 *
 * @author zacksleo <zacksleo@gmail.com>
 */
class BaseClient
{
    /**
     * @var \Zacksleo\EcSdk\Kernel\ServiceContainer
     */
    protected $app;

    /**
     * @var \Zacksleo\SuningSdk\Suning
     */
    protected $client;

    /**
     * BaseClient constructor.
     *
     * @param \EasyWeChat\Kernel\ServiceContainer                    $app
     * @param \EasyWeChat\Kernel\Contracts\AccessTokenInterface|null $accessToken
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
        $this->client = new Suning([
            'key'    => $app->getConfig('key'),
            'secret' => $app->getConfig('secret'),
            'debug'      => $app->getConfig('debug'),
            'file'       => $app->getConfig('file'),
            'level'      => $app->getConfig('level'),
            'permission' => $app->getConfig('permission'),
        ]);
    }
}
