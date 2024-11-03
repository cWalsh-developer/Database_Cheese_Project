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
        if(isset($_REQUEST["productUpdate"]))
        {
            $updateID = $_REQUEST["productUpdate"];
            $productObject = DataAccess::getInstance()->getProductsById($updateID);
            $_SESSION["productUpdate"] [] = $productObject;
        }
            if(isset($_REQUEST["productType"]))
            {
                
                foreach($_SESSION["productUpdate"] as $update)
                {
                    $productType = $_REQUEST["productType"];
                    $brand = $_REQUEST["brand"];
                    $cost = $_REQUEST["cost"];
                    $quantity = $_REQUEST["quantity"];
                    $strength = $_REQUEST["strength"];
                    $countryOfOrigin = $_REQUEST["countryOfOrigin"];
                    $weight = $_REQUEST["weight"];
                    $cheese = new Products();
                    $cheese->cheeseID = htmlentities($update->cheeseID);
                    $cheese->productType = htmlentities($productType);
                    $cheese->brand = htmlentities($brand);
                    $cheese->cost = htmlentities($cost);
                    $cheese->quantity = htmlentities($quantity);
                    $cheese->strength = htmlentities($strength);
                    $cheese->countryOfOrigin = htmlentities($countryOfOrigin);
                    $cheese->weight = htmlentities(trim($weight, "g"));
                    DataAccess::getInstance()->updateProducts($cheese);
            
                    $status = "Product Updated";
                    $_SESSION["productUpdate"] = null;
                }
                foreach($_SESSION["customerBasket"] as $basketItemsNumber)
                {
                    $basketCount +=$basketItemsNumber->quantity;
                }
                require_once "../View/adminHeaderFragment.php";
                require_once "../View/updateProducts_view.php";
            }
            else
            {
                foreach($_SESSION["customerBasket"] as $basketItemsNumber)
                {
                    $basketCount +=$basketItemsNumber->quantity;
                }
                require_once "../View/adminHeaderFragment.php";
                require_once "../View/updateProducts_view.php";
            }

    }
    else if(!empty($_SESSION["userDetails"]) && $_SESSION["userDetails"][0]->userType == "Customer")
    {
        if(!isset($_SESSION["customerBasket"]))
        {
            $_SESSION["customerBasket"] =[];
            $_SESSION["customerPreviousSearch"] =[];
            $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
        }
        foreach($_SESSION["customerBasket"] as $basketItemsNumber)
        {
            $basketCount +=$basketItemsNumber->quantity;
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
        require_once "../View/guest_products_view.php";
    }


?>