<?php
Class DataAccess 
{
    private static $instance = null;
    private $connection;
    private function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=db_k2116573",
        "k2116573",
        "oguizinu",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new DataAccess();
        }
        return self::$instance;
    }
    
    function getAllProducts()
    {
        $statement = $this->connection->prepare("SELECT * FROM products");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Products");
        return $results;
    }

    function getProductsByBrandName($brand)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE brand = ?");
        $statement->execute([$brand]);
        $results = $statement->fetchAll (PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getProductsByType($type)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE productType = ?");
        $statement->execute([$type]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getUsers($details)
    {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$details]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Users");
        return $results;
    }
}
?>