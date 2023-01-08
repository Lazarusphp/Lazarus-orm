<?php

namespace SnorkelWeb\QueryBuilder;

use Closure;
use Exception;
use SnorkelWeb\DBManager\Connection;
// Traits
use SnorkelWeb\QueryBuilder\Traits\Orderby;
use SnorkelWeb\QueryBuilder\Traits\Where;
use SnorkelWeb\QueryBuilder\Traits\GroupBy;
use SnorkelWeb\QueryBuilder\Traits\Having;
use SnorkelWeb\QueryBuilder\Traits\Joins;
use SnorkelWeb\QueryBuilder\Traits\Limit;
use SnorkelWeb\QueryBuilder\Traits\Params;
use SnorkelWeb\QueryBuilder\Traits\From;

class Select extends Connection
{
    private $sql;
    private $stmt;
    private $dbh;
    private $fetch;
    

    use From;
    use Orderby;
    use Where;
    use GroupBy;
    use Joins;
    use Limit;
    use Having;
    use Params;


    public function select($values)
    {
        $this->sql = "SELECT " . $values . " ";
        return $this;
    }

    private function sqlloader()
    {

        // Joins
        // Joins wiull go here joins needs to be worked on;
        // Where and or where;
        $this->sql .= $this->fetchJoins();
        $this->Fetchwhere();
        // GroupBy is complete
        $this->sql .= $this->FetchGroupBy();
        // Having is complete
        $this->sql .= $this->FetchHaving();
        // Order By is complete
        $this->sql .= $this->FetchOrderBy();

        //Limits are complete 
        $this->sql .= $this->FetchLimit();
    }

    public function save()
    {
        $params = array_combine($this->paramkey, $this->paramvalue);
        $this->sqlloader();
        // Start Prepare query
        $this->stmt = $this->GenerateQuery($this->sql, $params);
        return $this;
    }


    public function AsSql($sql)
    {
        $this->sql = $sql;
        return $this;
    }

    public function get()
    {
        return $this->Fetch_All();
    }

    public function first()
    {
        return $this->Fetch();
    }

    public function tosql()
    {
        return $this->sql;
    }

    public function tojson($value)
    {
        return json_encode($value);
    }


}
