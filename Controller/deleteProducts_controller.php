<?php
    require_once "../Model/Users.php";
    require_once "../Model/Products.php";
    session_start();
    require_once "../Model/DataAccess.php";
    $status = false;
    $passwordStatus = false;
    $quantityStatus = false;
    $basketCount = 0;
    if(!empty($_SESSION["userDetails"]) && $_SESSION["userDetails"][0]->userType == "Admin")
    {
        if(isset($_REQUEST["products"]))
        {
            $deleteID = $_REQUEST["products"];
            DataAccess::getInstance()->deleteProducts($deleteID);
        }
        foreach($_SESSION["customerBasket"] as $basketItemsNumber)
        {
            $basketCount +=$basketItemsNumber->quantity;
        }
        $_SESSION["results"] = DataAccess::getInstance()->getAllAdminProducts();
        require_once "../View/adminHeaderFragment.php";        
        require_once "../View/admin_view.php";
    }
    else if(!empty($_SESSION["userDetails"]) && $_SESSION["userDetails"][0]->userType == "Customer")
    {
        if(!isset($_SESSION["customerBasket"]))
        {
            $_SESSION["customerBasket"] =[];
            $_SESSION["customerPreviousSearch"] =[];
            $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
        }
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
        require_once "../View/login_view.php";
    }


?>