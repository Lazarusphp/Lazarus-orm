<?php
namespace SnorkelWeb\QueryBuilder;
use SnorkelWeb\DBManager\Connection;
use SnorkelWeb\QueryBuilder\Traits\Params;
use SnorkelWeb\QueryBuilder\Traits\Where;

class Update extends Connection
{

    use Where;
    use Params;


    private $pair = [];
    private $sql;

    public function update($table)
    {
        $this->sql = " UPDATE ". $table;
        return $this;
    }

    public function Set($key,$value)
    {
    
        $this->pair[] = $key."=:$key";
        $this->withparams("$key",$value);
        return $this;
    }
    
    
    public function LoadSetter()
    {
        $values = [];
        $this->sql .= " SET ";
        foreach($this->pair  as $pair)
        {
            $values[] = $pair;
        }
        $this->sql .= implode(",",$values);
        return $this;
    }

    public function tosql()
    {
        echo $this->sql;
    }

    public function Save()
    {
        $params = array_combine($this->paramkey, $this->paramvalue);
        $this->LoadSetter();
        $this->Fetchwhere();
        echo $this->tosql();
        $this->GenerateQuery($this->sql,$params);
        return $this;
    }
 
    
}