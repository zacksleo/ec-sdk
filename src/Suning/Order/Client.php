<?php

namespace Zacksleo\EcSdk\Suning\Order;

use Zacksleo\EcSdk\Kernel\QueryResult;
use Zacksleo\EcSdk\Kernel\QueryBuilder;
use Zacksleo\EcSdk\Contracts\Connection;
use Zacksleo\EcSdk\Suning\Base\BaseClient;

/**
 * 订单管理
 */
class Client extends BaseClient implements Connection
{
    /**
     * 查询订单
     *
     * @param string $start
     * @param string $end
     * @param int $page
     * @param int $pageSize
     * @return \Zacksleo\EcSdk\Kernel\QueryResult
     */
    public function query(QueryBuilder $builder): QueryResult
    {
        $client = $this->client;
        $params = [
            'startTime' => $builder->start,
            'endTime'   => $builder->end,
            'pageNo'    => $builder->offset,
            'pageSize'  => $builder->limit,
        ];

        //如果超过30天，则查询历史接口
        if (time() - strtotime($builder->end) > 30 * 3600 * 24) {
            return $this->resolveResult($client->custom->historyorder->query($params));
        }

        return $this->resolveResult($client->custom->order->query($params));
    }

    /**
     * 处理返回结果
     *
     * @param array $res
     * @return QueryResult
     */
    private function resolveResult($res)
    {
        return new QueryResult($res['body'], $res['header']['pageTotal'], $res['header']['pageTotal'] >= $res['header']['pageNo']);
    }
}
