<?php 
session_start();
require_once "../Model/products.php";
require_once "../Model/dataAccess.php";

if(!isset($_SESSION["previousSearch"]))
{
    $_SESSION["previousSearch"] = [];
}

if(!isset($_REQUEST["search"]))
{
    $results = getAllProducts();
}
else
{
    $search = $_REQUEST["search"];
    $_SESSION["previousSearch"] [] = $search;
    $results = getProductsByBrandName($search);
    if ($results == null)
    {
        $results = getProductsByType($search);
    }
}


require_once "../View/products_view.php";
?>