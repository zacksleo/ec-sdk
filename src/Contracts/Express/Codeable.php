<?php

namespace Zacksleo\EcSdk\Contracts\Express;

interface Codeable
{
    /**
     * 根据名称查询对应的编码
     *
     * @param string $name
     * @return string
     */
    public function name2code(string $name);
}
