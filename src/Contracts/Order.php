<?php

namespace Zacksleo\EcSdk\Contracts;

interface Order
{
    /**
     * 订单查询
     *
     * @param string $start 开始时间
     * @param string $end   截止时间
     * @param int $page 页码
     * @param int $pageSize 每页条数
     * @return array
     */
    public function query(string $start, string $end, int $page = 1, int $pageSize = 10);
}
