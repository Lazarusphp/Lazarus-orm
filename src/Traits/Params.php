<?php

namespace SnorkelWeb\QueryBuilder\Traits;

trait Params
{

    protected $params;
    protected $paramkey = [];
    protected $paramvalue = [];
    public function withparams($keys, $values)
    {
        $this->paramkey[] = $keys;
        $this->paramvalue[] = $values;
        return $this;
    }

    // Removed ParamBinder, Moved Method to DBManager Package
}
