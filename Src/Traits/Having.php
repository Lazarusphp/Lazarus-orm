<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait Having
{

    protected $having;
    public function Having($key,$value,$operator)
    {

        $this->having = $key.$operator.$value;
        return $this;
    }

    public function FetchHaving()
    {

         return !empty($this->having) ? " HAVING ".$this->having." " : false;
         

    }
}