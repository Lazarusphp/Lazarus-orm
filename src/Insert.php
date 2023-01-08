<?php
namespace SnorkelWeb\QueryBuilder;

use SnorkelWeb\DBManager\Connection;
use SnorkelWeb\QueryBuilder\Traits\Params;

class Insert extends Connection
{
  
    private $sql;
    private $stmt;
    public $lastid;

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
   


    public function save()
    {
        $params = array_combine($this->paramkey,$this->paramvalue);
        // Start Prepare query
        $this->stmt = $this->GenerateQuery($this->sql,$params);
        // Retrieve id
        return $this;

    }

    public function tojson($value)
    {
        return json_encode($value);
    }


}