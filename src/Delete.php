<?php
namespace SnorkelWeb\QueryBuilder;

use SnorkelWeb\DBManager\Connection;
use SnorkelWeb\QueryBuilder\Traits\From;
use SnorkelWeb\QueryBuilder\Traits\Params;
use SnorkelWeb\QueryBuilder\Traits\Where;

class Delete extends Connection
{
  
    private $sql;
    private $stmt;

    // traits

    use From;
    use Params;
    use Where;

    public function Delete()
    {
        $this->sql = "Delete ";
        return $this;

    }

    // insert names


    public function save()
    {        
        /**
         * Retrieve WHere Values if neeeded.
        */
         $this->Fetchwhere();

         $params = array_combine($this->paramkey,$this->paramvalue);
         // Start Prepare query
         $this->stmt = $this->GenerateQuery($this->sql,$params);
         return $this;
    }

}