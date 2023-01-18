<?php
namespace SnorkelWeb\QueryBuilder\Traits;

use Closure;

trait Joins
{

    protected $join;
    protected $joinmerge = [];
    use Params;


    public function join($value,$alias,Closure $closure=null)
    {
        $param1 = uniqid("value_");
        $param2 = uniqid("Alias_");
        $this->join = " JOIN $value AS $alias ";
        if(!is_null($closure))
        {
        $closure();
        }
        // $this->withparams(":$param1",$value);
        // $this->withparams(":$param2",$alias);
        $this->joinmerge[] =  $this->join;
      
        return $this;
    }

    public function leftJoin($value,$alias,Closure $closure=null)
    {
            $this->join = " LEFT JOIN $value AS $alias ";
            if(!is_null($closure))
            {
            $closure();
            }
            $this->joinmerge[] =  $this->join;
            return $this;
    }

    public function RightJoins($value,$alias=null,Closure $closure=null)
    {

            $this->join = " RIGHT JOIN $value AS $alias ";
            if(!is_null($closure))
            {
            $closure();
            }
            $this->joinmerge[] =  $this->join;
            return $this;
    }
    

    public function on($pk,$fk,$operator=null)
    {
        $operator = $operator ?? "=";
        $this->join .= " ON " . $pk.$operator.$fk;
       return $this;
    }
    
    
    /**
     * USING Allows Joins to work in place of ON if the column name matches
     * 
     * i.e users.employee_id = pages.employee_id join Pages USING ("employee_id")
     * 
     *
     * @param  mixed $key
     * @return $this->join
     */
    public function using($key)
    {
        $this->join . "USING ($key)";
       return $this;
    }

    public function fetchJoins()
    {
        $combine = [];
    
        if(!empty($this->joinmerge))
        {
        foreach($this->joinmerge  as $merge)
            {
                $combine[] = $merge;
            }
        return implode(" ", $combine); 
        }
        
        
    }


}