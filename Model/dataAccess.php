<?php 
    $pdo = new PDO("mysql:host=localhost;dbname=db_k2116573",
    "k2116573",
    "oguizinu",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    function getAllProducts()
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM products");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Products");
        return $results;
    }

    function getProductsByBrandName($brand)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM products WHERE brand = ?");
        $statement->execute([$brand]);
        $results = $statement->fetchAll (PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getProductsByType($type)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM products WHERE productType = ?");
        $statement->execute([$type]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
?>