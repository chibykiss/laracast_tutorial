<?php

namespace Core;
use PDO;

class Database
{
    public $connection;
    public $statement;

    public function  __construct($config)
    {
   
        $dsn = 'mysql:'.http_build_query($config,'',';');

        //$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
        $this->connection = new PDO($dsn,'root','',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($sql, $params = [])
    {
       

        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);

        return $this;
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findorfail(){
        $result = $this->find();
        if(!$result){
            abort();
        }
        return $result;
    }

    public function get(){
        return $this->statement->fetchAll();
    }
}