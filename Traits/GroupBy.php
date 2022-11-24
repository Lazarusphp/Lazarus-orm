<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait GroupBy
{

    
        private $group;
        public function GroupBy($value)
        {
            $this->group = $value;
            return $this;
        }
    
        public function FetchGroupBy ()
        {
            
            return !empty($this->group) ? " GROUP BY " . $this->group . " " : false;
        }
    
}