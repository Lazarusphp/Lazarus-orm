<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait Where
{

    protected $where = [];
    use Params;
    public function where($key,$value,$operator=null)
    {
         $operator = $operator ?? "=";
         $condition =$key.$operator."$value";
        //  $condition =$key.$operator.":$key";
          if(count($this->where))
          {
              $condition = " AND " . $condition;
              
          }
          
          $this->where[] = $condition;
        //   $this->withparams(":$key","$value");
          return $this;
      }
      
      public function orwhere($key,$value,$operator=null)
      {
        $operator = $operator ?? "=";
        $condition =$key.$operator."$value";
        // $condition =$key.$operator.":$key";
         if(count($this->where))
         {
             $condition = " OR " . $condition;
             
         }
         $this->where[] = $condition;
        //  $this->withparams(":$key","$value");
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