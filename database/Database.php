<?php

class Database
{
    public $connection;

    public $statement;

    public function __construct($config, $username, $password)
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    public function querry($querry, $params = [])
    {
        $this->statement = $this->connection->prepare($querry);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {

        return $this->statement->fetchAll();
    }

    public function find()
    {

        return $this->statement->fetch();
    }
}
