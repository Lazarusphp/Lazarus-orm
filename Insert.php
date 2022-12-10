<?php
namespace App\Core\QueryBuilder;

use App\Core\Database\Connection;
use App\Core\QueryBuilder\Traits\Params;

class Insert extends Connection
{
  
    private $sql;
    private $stmt;

    // traits

    use Params;


   /**
     * INSERT SECTION
     * 
     * The FOllowing section can only be used with the Set collection of Objects Withnames() WithValues(), The final result will be as so
     * "INSERT INTO TABLENAMES NAMES) VALUES(VALUES)";
     * This statement can then be used in A Prepared Statement command ready for execution
     */

    public function insert($table)
    {
        $this->sql = "INSERT INTO " . $table . " ";
        return $this;

        
    }

    // insert names

    public function withnames($names)
    {
        $this->sql .= "($names)";
        return $this;
    }

    public function withvalues(string $values)
    {
          $this->sql .= " VALUES($values)";
          return $this;
    }

    public function prepare($sql)
    {
       return $this->pdo->prepare($sql);
    }


    public function save()
    {
        $this->stmt = $this->prepare($this->sql);
    // Param Binder
       $this->parambinder();
        // Execute the final Script;
         $this->stmt->execute();
        //  return $this;
    }

    public function tojson($value)
    {
        return json_encode($value);
    }

    public function LastId()
    {
        return $this->pdo->lastInsertId();
    }

}