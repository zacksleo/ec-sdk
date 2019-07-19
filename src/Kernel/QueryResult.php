<?php

namespace Zacksleo\EcSdk\Kernel;

class QueryResult
{
    public $total;
    public $hasNext;
    public $body;

    public function __construct(array $body, int $total = 1, $hasNext = true)
    {
        $this->body = $body;
        $this->total = $total;
        $this->hasNext = $hasNext;
    }
}
