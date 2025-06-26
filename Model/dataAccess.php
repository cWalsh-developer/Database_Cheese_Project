<?php
require_once realpath(__DIR__."/vendor/autoload.php");
use Dotenv\Dotenv;

Class DataAccess 
{
    private static $instance = null;
    private $connection;
    private $dbName;
    private $dbUser;
    private $dbPassword;
    private $dbHost;
    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $this->dbName = getenv('DB_NAME');
        $this->dbUser = getenv('DB_USER');
        $this->dbPassword = getenv('DB_PASSWORD');
        $this->dbHost = getenv('DB_HOST');

        $this->connection = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}",
        "{$this->dbUser}",
        "{$this->dbPassword}",
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
        $statement = $this->connection->prepare("SELECT * FROM products WHERE quantity !=0");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Products");
        return $results;
    }

    function getProductsByBrandName($brand)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE brand = ? AND quantity !=0");
        $statement->execute([$brand]);
        $results = $statement->fetchAll (PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getProductsById($Id)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE cheeseID = ?");
        $statement->execute([$Id]);
        $results = $statement->fetchAll (PDO::FETCH_CLASS, "Products");
        return $results[0];
    }

    function getProductsByType($type)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE productType = ? AND quantity !=0");
        $statement->execute([$type]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
    
    function getProductsByCost($cost)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE cost = ? AND quantity !=0");
        $statement->execute([$cost]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
    
    function getProductsByWeight($weight)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE weight = ? AND quantity !=0");
        $statement->execute([$weight]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
   
    function getProductsByStrength($strength)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE strength = ? AND quantity !=0");
        $statement->execute([$strength]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
    
    function getProductsByCountryOfOrigin($country)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE countryOfOrigin = ? AND quantity !=0");
        $statement->execute([$country]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getAllAdminProducts()
    {
        $statement = $this->connection->prepare("SELECT * FROM products");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Products");
        return $results;
    }

    function getAdminProductsByBrandName($brand)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE brand = ?");
        $statement->execute([$brand]);
        $results = $statement->fetchAll (PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getAdminProductsByType($type)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE productType = ?");
        $statement->execute([$type]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
    
    function getAdminProductsByCost($cost)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE cost = ?");
        $statement->execute([$cost]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
    
    function getAdminProductsByWeight($weight)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE weight = ?");
        $statement->execute([$weight]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
   
    function getAdminProductsByStrength($strength)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE strength = ?");
        $statement->execute([$strength]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }
    
    function getAdminProductsByCountryOfOrigin($country)
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE countryOfOrigin = ?");
        $statement->execute([$country]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Products");
        return $results;
    }

    function getAllUsers()
    {
        $statement = $this->connection->prepare("SELECT * FROM users");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Users");
        return $results;
    }

    function getUsersByEmail($emails)
    {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$emails]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Users");
        return $results;
    }
    
    function addProducts($productDetails)
    {
        $statement = $this->connection->prepare("INSERT INTO products (productType, brand, cost, quantity, strength, countryOfOrigin, weight) VALUES (?,?,?,?,?,?,?)");
        $statement->execute([$productDetails->productType,
                            $productDetails->brand,
                            $productDetails->cost,
                            $productDetails->quantity,
                            $productDetails->strength,
                            $productDetails->countryOfOrigin,
                            $productDetails->weight,]);
    }

    function updateProducts($productUpdate)
    {
        $statement = $this->connection->prepare("UPDATE products SET productType = ?, brand = ?, cost = ?, quantity = ?, strength = ?, countryOfOrigin = ?, weight = ? WHERE cheeseID = ?");
        $statement->execute([$productUpdate->productType,
                            $productUpdate->brand,
                            $productUpdate->cost,
                            $productUpdate->quantity,
                            $productUpdate->strength,
                            $productUpdate->countryOfOrigin,
                            $productUpdate->weight,
                            $productUpdate->cheeseID]);
    }

    function deleteProducts($productDelete)
    {
        $statement = $this->connection->prepare("DELETE FROM products WHERE cheeseID = ?");
        $statement->execute([$productDelete]);
    }

    function addCustomer($details)
    {
        $statement = $this->connection->prepare("INSERT INTO users (givenName, familyName, email, password, addressLineOne, addressLineTwo, Town_city, Postcode) VALUES (?,?,?,?,?,?,?,?)");
        $statement->execute([$details->givenName,
                            $details->familyName,
                            $details->email,
                            $details->password,
                            $details->addressLineOne,
                            $details->addressLineTwo,
                            $details->townCity,
                            $details->postcode]);
    }

    function insertUserInfoIntoOrder($userOrderInfo)
    {
        $statement = $this->connection->prepare("INSERT INTO orders (userId, orderDate, givenName, familyName, email, addressLineOne, addressLineTwo, Town_city, Postcode) VALUES (?,NOW(),?,?,?,?,?,?,?)");
        $statement->execute([$userOrderInfo->userId,
                            $userOrderInfo->givenName,
                            $userOrderInfo->familyName,
                            $userOrderInfo->email,
                            $userOrderInfo->addressLineOne,
                            $userOrderInfo->addressLineTwo,
                            $userOrderInfo->townCity,
                            $userOrderInfo->postcode]);
    }

    function getAllOrderId()
    {
        $statement = $this->connection->prepare("SELECT * FROM orders");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Orders");
        return $results;
    }

    function insertOrderIntoOrderItems($returnedOrderInfo)
    {
        $statement = $this->connection->prepare("INSERT INTO orderItems (orderNo, cheeseID, totalQuantity, totalCost, totalWeight) VALUES (?,?,?,?,?)");
        $statement->execute([$returnedOrderInfo[0],$returnedOrderInfo[1],$returnedOrderInfo[2],$returnedOrderInfo[3],$returnedOrderInfo[4]]);
    }
}
?>
