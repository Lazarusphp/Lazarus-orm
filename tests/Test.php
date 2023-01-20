<?php
namespace SnorkelWeb\QueryBuilder\tests;
use SnorkelWeb\QueryBuilder\Select;

class Test
{
    
    public function hello()
    {
        echo "Hello im live";

    }

    public function select()
    {
        $select = new Select();
        $select->select("username")->from("users")->save();
        $user = $select->Fetch();
       echo $user->username;
    }
}