<?php

namespace Zacksleo\EcSdk\Suning\Express;

use Zacksleo\EcSdk\Suning\Base\BaseClient;
use Zacksleo\EcSdk\Contracts\Express\Codeable;

/**
 * 物流公司管理
 */
class Client extends BaseClient implements Codeable
{
    public function name2code(string $name)
    {
        $client = $this->client;

        $res = $client->custom->logisticcompany->get([
            'companyName' => $name,
        ]);

        return $res['body']['expressCompanyCode'] ?? null;
    }
}
