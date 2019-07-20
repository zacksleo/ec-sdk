<?php

namespace Zacksleo\EcSdk\Kernel;

/**
 * 返回结果
 */
class QueryResult
{
    /**
     * 总条目数
     *
     * @var int
     */
    public $totalCount;
    /**
     * 总页码数
     *
     * @var int
     */
    public $pageCount;
    /**
     *  当前页码
     *
     * @var int
     */
    public $currentPage;
    /**
     * 每页大小
     *
     * @var int
     */
    public $perPage;
    /**
     * 是否存在下一页
     *
     * @var bool
     */
    public $hasNext;
    /**
     * 数据
     *
     * @var array
     */
    public $data;

    public function __construct(array $data, int $totalCount, int $pageCount = 1, int $currentPage = 1, int $perPage = 10, $hasNext = true)
    {
        $this->data = $data;
        $this->totalCount = $totalCount;
        $this->pageCount = $pageCount;
        $this->currentPage = $currentPage;
        $this->perPage = $perPage;
        $this->hasNext = $hasNext;
    }
}
