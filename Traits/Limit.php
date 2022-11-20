<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait Limit
{
     public function limit($min,$max=null)
     {
         $this->limit = $min;
         if(!is_null($max))
         {
             $this->limit .= ",".$max;
         }
         return $this;
     }

     
     public function FetchLimit()
     {
         return !empty($this->limit) ? " LIMIT ". $this->limit : false;
     }
}