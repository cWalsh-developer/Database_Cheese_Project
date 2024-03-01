<?php 
session_start();
require_once "../Model/DataAccess.php";
require_once "../Model/Products.php";


if(!isset($_REQUEST["search"]))
{
    $results = DataAccess::getInstance()->getAllProducts();
}
else
{
    $search = $_REQUEST["search"];
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


if($_SESSION["userDetails"] == "Admin")
{
    require_once "../View/admin_view.php";
}
else if($_SESSION["userDetails"] == "Customer")
{
    header("Location: ../Controller/products_controller.php");
    exit;
}
else
{
    header("Location: ../Controller/login_control.php");
    exit;
}

?>