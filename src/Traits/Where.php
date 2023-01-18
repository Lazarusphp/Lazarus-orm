<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait Where
{

    protected $where = [];
    use Params;
    public function where($key,$value,$operator=null)
    {
         $operator = $operator ?? "=";
        //  $condition =$key.$operator."$value";
        $params = uniqid("where_");
         $condition = $key.$operator.":$params";
          if(count($this->where))
          {
              $condition = " AND " . $condition;
          }
          $this->where[] = $condition;
          $this->withparams(":$params","$value");
          return $this;
      }

      public function Between($key,$value1,$value2)
      {
         $condition = $key . " BETWEEN ". $value1." AND " . $value2 . " ";
         $params = uniqid("between_");
          if(count($this->where))
          {
              $condition = " AND " . $condition;
              
          }
          
          $this->where[] = $condition;
          
          return $this;
      }

      public function NotBetween($key,$value1,$value2)
      {
        $params = uniqid("Nbetween_");
        $condition = $key . " NOT BETWEEN ". $value1." AND " . $value2 . " ";
        if(count($this->where))
        {
            $condition = " AND " . $condition;
            
        }
        
        $this->where[] = $condition;
        
        return $this;
      }
      
      public function orwhere($key,$value,$operator=null)
      {
        $operator = $operator ?? "=";
        $params = uniqid("Orwhere_");
        $condition = $key.$operator.":$params";
        if(count($this->where))
        {
            $condition = " AND " . $condition;
        }
        $this->where[] = $condition;
        $this->withparams(":$params","$value");
        return $this;
      }
      
      public function Fetchwhere()
      {
        $wherecond = [];
          $wheres = $this->where;
          if(!empty($wheres))
          {
          $this->sql .= " WHERE ";
           foreach($wheres as $where)
              {
                  $wherecond[] = $where;
              }
          $this->sql .= implode(" ",$wherecond);
          }
          else
          {
            
          }
           return $this;
      }

}