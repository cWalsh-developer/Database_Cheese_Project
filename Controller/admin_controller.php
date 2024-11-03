<?php 
require_once "../Model/Products.php";
require_once "../Model/Users.php";
session_start();
require_once "../Model/DataAccess.php";
$basketCount = 0;
if(!empty($_SESSION["userDetails"]) && $_SESSION["userDetails"] [0]->userType =="Admin")
{

    
    if(!isset($_REQUEST["search"]))
    {
        $_SESSION["results"] = DataAccess::getInstance()->getAllAdminProducts();
    }
    else
    {
        $search = $_REQUEST["search"];
        if (DataAccess::getInstance()->getAdminProductsByBrandName($search) != null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAdminProductsByBrandName($search);
        }
        else if(DataAccess::getInstance()->getAdminProductsByType($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAdminProductsByType($search);
        }
        else if(DataAccess::getInstance()->getAdminProductsByCost($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAdminProductsByCost($search);
        }
        else if(DataAccess::getInstance()->getAdminProductsByCountryOfOrigin($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAdminProductsByCountryOfOrigin($search);
        }
        else if(DataAccess::getInstance()->getAdminProductsByWeight(trim($search, "g")) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAdminProductsByWeight($search);
        }
        else if(DataAccess::getInstance()->getAdminProductsByStrength($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAdminProductsByStrength($search);
        }
        else
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAllAdminProducts();
        }
    }
    foreach($_SESSION["customerBasket"] as $basketItemsNumber)
    {
        $basketCount +=$basketItemsNumber->quantity;
    }
    require_once "../View/adminHeaderFragment.php";
    require_once "../View/admin_view.php";
}
else if(!empty($_SESSION["userDetails"]) && $_SESSION["userDetails"][0]->userType == "Customer")
{
    if(!isset($_SESSION["customerBasket"]))
    {
        $_SESSION["customerBasket"] =[];
        $_SESSION["customerPreviousSearch"] =[];
    }
    $quantityStatus = false;
    $status = false;
    $passwordStatus = false;
    require_once "../View/customerHeaderFragment.php";
    require_once "../View/customer_products_view.php";
}
else
{
    if(!isset($_SESSION["basket"]))
    {
        $_SESSION["basket"] =[];
        $_SESSION["previousSearch"] =[];
        $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
    }
    $quantityStatus = false;
    $status = false;
    $passwordStatus = false;
    require_once "../View/guest_products_view.php";
}





?>