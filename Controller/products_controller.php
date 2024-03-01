<?php 
session_start();
require_once "../Model/Products.php";
require_once "../Model/DataAccess.php";

if(!isset($_SESSION["previousSearch"]))
{
    $_SESSION["previousSearch"] = [];
}

if(!isset($_REQUEST["search"]))
{
    $results = DataAccess::getInstance()->getAllProducts();
}
else
{
    $search = $_REQUEST["search"];
    $_SESSION["previousSearch"] [] = $search;
    $results = DataAccess::getInstance()->getProductsByBrandName($search);
    if ($results == null)
    {
        $results = DataAccess::getInstance()->getProductsByType($search);
        if($results == null)
        {
            $results = DataAccess::getInstance()->getAllProducts();
        }
    }
}


require_once "../View/products_view.php";
?>