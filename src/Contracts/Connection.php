<?php

namespace Zacksleo\EcSdk\Contracts;

use Zacksleo\EcSdk\Kernel\QueryResult;
use Zacksleo\EcSdk\Kernel\QueryBuilder;

interface Connection
{
    public function query(QueryBuilder $builder): QueryResult;
}
