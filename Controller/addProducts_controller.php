<?php
    require_once "../Model/Users.php";
    require_once "../Model/Products.php";
    session_start();
    $status = false;
    $quantityStatus = false;
    $basketCount = 0;
    if(!empty($_SESSION["userDetails"]) && $_SESSION["userDetails"][0]->userType == "Admin")
    {
        require_once "../Model/DataAccess.php";
        if(isset($_REQUEST["productType"]))
        {
            $productType = $_REQUEST["productType"];
            $brand = $_REQUEST["brand"];
            $cost = $_REQUEST["cost"];
            $quantity = $_REQUEST["quantity"];
            $strength = $_REQUEST["strength"];
            $countryOfOrigin = $_REQUEST["countryOfOrigin"];
            $weight = $_REQUEST["weight"];
    
            $cheese = new Products();
            $cheese->productType = htmlentities($productType);
            $cheese->brand = htmlentities($brand);
            $cheese->cost = htmlentities($cost);
            $cheese->quantity = htmlentities($quantity);
            $cheese->strength = htmlentities($strength);
            $cheese->countryOfOrigin = htmlentities($countryOfOrigin);
            $cheese->weight = htmlentities(trim($weight, "g"));
    
            DataAccess::getInstance()->addProducts($cheese);
    
            $status = "New Product Added";
        }
        foreach($_SESSION["customerBasket"] as $basketItemsNumber)
        {
            $basketCount +=$basketItemsNumber->quantity;
        }
        require_once "../View/adminHeaderFragment.php";
        require_once "../View/addProducts_view.php";
    }
    else
    {
        if(!isset($_SESSION["basket"]))
    {
        $_SESSION["basket"] =[];
        $_SESSION["previousSearch"] =[];
        $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
    }
        $passwordStatus = false;
        require_once "../View/guest_products_view.php";
    }


?>