<?php

namespace Zacksleo\EcSdk\Kernel;

use Zacksleo\EcSdk\Concerns\ForwardsCalls;

class Order
{
    use ForwardsCalls;

    public $query;

    /**
     * Create a new Eloquent query builder instance.
     *
     * @param  \Zacksleo\EcSdk\Kernel\QueryBuilder  $query
     * @return void
     */
    public function __construct(QueryBuilder $query)
    {
        $this->query = $query;
    }

    /**
     * Dynamically handle calls into the query instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $this->forwardCallTo($this->query, $method, $parameters);

        return $this;
    }
}
