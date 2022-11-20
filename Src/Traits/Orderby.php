<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait Orderby
{

    private $order;

    public function Orderby($value,$direction=null)
    {
        $this->order =  $value;
        if(is_null($direction))
        {
            $direction =" ASC ";
        }
         $this->order .= " ". $direction ." ";
        return $this;
    }

    public function FetchOrderBy()
    {
        // echo $this->order;
        return !empty($this->order) ? " ORDER BY " . $this->order : false;
    }

}