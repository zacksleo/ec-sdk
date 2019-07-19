<?php

namespace Zacksleo\EcSdk\Kernel;

use Zacksleo\EcSdk\Contracts\Connection;

class QueryBuilder
{
    /**
     * 查询连接
     *
     * @var \Zacksleo\EcSdk\Contracts\Connection
     */
    public $connection;

    /**
     * The columns that should be returned.
     *
     * @var array
     */
    public $columns;

    /**
     * 数据源
     *
     * @var string
     */
    public $from;

    /**
     * 开始时间.
     *
     * @var string
     */
    public $start;
    /**
     * 截止时间.
     *
     * @var string
     */
    public $end;

    /**
     * The maximum number of records to return.
     *
     * @var int
     */
    public $limit = 10;

    /**
     * The number of records to skip.
     *
     * @var int
     */
    public $offset = 1;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Run a select statement against the database and returns a generator.
     *
     * @return \Generator
     */
    public function cursor()
    {
        $total = $this->total();
        for ($i = 1; $i < $total; $i++) {
            yield $this->forPage($i, $this->limit);
        }
    }

    /**
     * Chunk the results of the query.
     *
     * @param  int  $count
     * @param  callable  $callback
     * @return bool
     */
    public function chunk($count, callable $callback)
    {
        $page = 1;

        do {
            // We'll execute the query for the given page and get the results. If there are
            // no results we can just break and return from here. When there are results
            // we will call the callback with the current chunk of these results here.
            $results = $this->forPage($page, $count)->get();

            $countResults = $results->total;

            if ($countResults == 0) {
                break;
            }

            // On each chunk result set, we will pass them to the callback and then let the
            // developer take care of everything within the callback, which allows us to
            // keep the memory low for spinning through large result sets for working.
            if ($callback($results, $page) === false) {
                return false;
            }

            unset($results);

            $page++;
        } while ($countResults == $count);

        return true;
    }

    /**
     * Set the table which the query is targeting.
     *
     * @param  string  $table
     * @return $this
     */
    public function from($table)
    {
        $this->from = $table;

        return $this;
    }

    /**
     * Set the columns to be selected.
     *
     * @param  array|mixed  $columns
     * @return $this
     */
    public function select($columns = ['*'])
    {
        $this->columns = is_array($columns) ? $columns : func_get_args();

        return $this;
    }

    /**
     * 过滤时间
     *
     * @param string $start
     * @param string $end
     * @return void
     */
    public function whereBetween(string $start, string $end)
    {
        $this->start = $start;
        $this->end = $end;

        return $this;
    }

    /**
     * Set the limit and offset for a given page.
     *
     * @param  int  $page
     * @param  int  $perPage
     * @return \Zacksleo\EcSdk\Contracts\Order\QueryBuilder|static
     */
    public function forPage($page, $perPage = 15)
    {
        return $this->offset($page)->limit($perPage);
    }

    /**
     * Set the "offset" value of the query.
     *
     * @param  int  $value
     * @return $this
     */
    public function offset($value)
    {
        $this->offset = max(0, $value);

        return $this;
    }

    /**
     * Set the "limit" value of the query.
     *
     * @param  int  $value
     * @return $this
     */
    public function limit($value)
    {
        if ($value >= 0) {
            $this->limit = $value;
        }

        return $this;
    }

    public function total()
    {
        $res = $this->forPage(1, 1)->get();

        return $res->total;
    }

    /**
     * Undocumented function
     *
     * @return \Zacksleo\EcSdk\Kernel\QueryResult
     */
    public function get()
    {
        return $this->connection->query($this);
    }
}
