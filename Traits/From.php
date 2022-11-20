<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait From
{
    
    public function from($table,$alias =null)
    {
    
        $this->sql .= " FROM ";
        $this->sql .= $table;
        if(!is_null($alias))
        {
            $this->sql .= " AS $alias ";
        }
        return $this;
    }

}