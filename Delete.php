<?php
namespace App\Core\QueryBuilder;

use App\Core\Database\Connection;
use App\Core\QueryBuilder\Traits\From;
use App\Core\QueryBuilder\Traits\Params;
use App\Core\QueryBuilder\Traits\Where;

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

    public function prepare($sql)
    {
       return $this->pdo->prepare($sql);
    }


    public function save()
    {        
        /**
         * Retrieve WHere Values if neeeded.
        */
         $this->Fetchwhere();

        $this->stmt = $this->prepare($this->sql);
    // Param Binder
       $this->parambinder();
        // Execute the final Script;
        echo $this->sql;
         $this->stmt->execute();
         return $this;
    }

}