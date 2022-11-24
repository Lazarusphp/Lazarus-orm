<?php
namespace App\Core\QueryBuilder;

use App\Core\Database\Connection;

class Update extends Connection
{

    public function update($table)
    {
        $this->sql = " UPDATE ". $table . " SET ";
        
        return $this;
    }

    public function set($key,$value)
    {
        $this->setkey[] = $key;
        $this->setvalue[] = $value;
        return $this;
    }
    
}