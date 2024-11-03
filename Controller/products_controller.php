<?php 
require_once "../Model/Users.php";
require_once "../Model/Products.php";
require_once "../Model/DataAccess.php";
session_start();
if(!isset($_SESSION["basket"]))
{
    $_SESSION["basket"] = [];
    $_SESSION["previousSearch"] = [];
    $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
}

$quantityStatus = false;
$productObjectStatus = true;

if(!empty($_SESSION["userDetails"]))
{
    if(isset($_REQUEST["customerProducts"]))
    {
        $basketID = $_REQUEST["customerProducts"];
        $productObject = DataAccess::getInstance()->getProductsById($basketID);
        if(empty($_SESSION["customerBasket"]))
        {
            $productObject->quantity = 1;
            $_SESSION["customerBasket"] [] = $productObject;
        }
        else
        {
            for($i=0; $i<sizeof($_SESSION["customerBasket"]); $i++)
            {
                if($productObject->quantity == $_SESSION["customerBasket"][$i]->quantity && $productObject->cheeseID == $_SESSION["customerBasket"][$i]->cheeseID)
                {
                    $quantityStatus = "You cannot add more than the available quantity!";
                    $productObjectStatus = false;
                }
                else
                {
                    if($_SESSION["customerBasket"][$i]->cheeseID == $productObject->cheeseID)
                    {
                        $_SESSION["customerBasket"] [$i]->quantity++;
                        $productObjectStatus = false;
                    }
                }
            }
            if($productObjectStatus !=false)
            {
                $productObject->quantity = 1;
                $_SESSION["customerBasket"] [] = $productObject;
            }
            
        }
    }
    $basketCount =0;
    foreach($_SESSION["customerBasket"] as $basketItems)
    {
        $basketCount += $basketItems->quantity;
    }
    if(!isset($_REQUEST["search"]))
    {
        $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
    }
    else
    {
        $search = htmlentities($_REQUEST["search"]);
        if(trim($search, " ") !="")
        {
            $_SESSION["customerPreviousSearch"] [] = $search;
        }
        if (DataAccess::getInstance()->getProductsByBrandName($search) != null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByBrandName($search);
        }
        else if(DataAccess::getInstance()->getProductsByType($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByType($search);
        }
        else if(DataAccess::getInstance()->getProductsByCost($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByCost($search);
        }
        else if(DataAccess::getInstance()->getProductsByCountryOfOrigin($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByCountryOfOrigin($search);
        }
        else if(DataAccess::getInstance()->getProductsByWeight(trim($search, "g")) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByWeight($search);
        }
        else if(DataAccess::getInstance()->getProductsByStrength($search) !=null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByStrength($search);
        }
        else
        {
            $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
        }
    }
    if($_SESSION["userDetails"][0]->userType == "Admin")
    {
        require_once "../View/adminHeaderFragment.php";
        require_once "../View/customer_products_view.php";
    }
    else
    {
        require_once "../View/customerHeaderFragment.php";
        require_once "../View/customer_products_view.php";
    }
}
else if(empty($_SESSION["userDetails"]))
{
    if(isset($_REQUEST["products"]))
    {
        $basketID = $_REQUEST["products"];
        $productObject = DataAccess::getInstance()->getProductsById($basketID);
        if(empty($_SESSION["basket"]))
        {
            $productObject->quantity = 1;
            $_SESSION["basket"] [] = $productObject;
        }
        else
        {
            for($i=0; $i<sizeof($_SESSION["basket"]); $i++)
            {
                if($productObject->quantity == $_SESSION["basket"][$i]->quantity && $productObject->cheeseID == $_SESSION["basket"][$i]->cheeseID)
                {
                    $quantityStatus = "You cannot add more than the available quantity!";
                    $productObjectStatus = false;
                }
                else
                {
                    if($_SESSION["basket"][$i]->cheeseID == $productObject->cheeseID)
                    {
                        $_SESSION["basket"] [$i]->quantity++;
                        $productObjectStatus = false;
                    }
                }
            }
            if($productObjectStatus !=false)
            {
                $productObject->quantity = 1;
                $_SESSION["basket"] [] = $productObject;
            }
            
        }
    }
    $basketCount =0;
    foreach($_SESSION["basket"] as $basketItems)
    {
        $basketCount += $basketItems->quantity;
    }
    if(!isset($_REQUEST["search"]))
    {
        $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
    }
    else
    {
        $search = htmlentities($_REQUEST["search"]);
        if(trim($search, " ") !="")
        {
            $_SESSION["previousSearch"] [] = $search;
        }
        if (DataAccess::getInstance()->getProductsByBrandName($search) != null)
        {
            $_SESSION["results"] = DataAccess::getInstance()->getProductsByBrandName($search);
        }
            else if(DataAccess::getInstance()->getProductsByType($search) !=null)
            {
                $_SESSION["results"] = DataAccess::getInstance()->getProductsByType($search);
            }
            else if(DataAccess::getInstance()->getProductsByCost($search) !=null)
            {
                $_SESSION["results"] = DataAccess::getInstance()->getProductsByCost($search);
            }
            else if(DataAccess::getInstance()->getProductsByCountryOfOrigin($search) !=null)
            {
                $_SESSION["results"] = DataAccess::getInstance()->getProductsByCountryOfOrigin($search);
            }
            else if(DataAccess::getInstance()->getProductsByWeight(trim($search, "g")) !=null)
            {
                $_SESSION["results"] = DataAccess::getInstance()->getProductsByWeight($search);
            }
            else if(DataAccess::getInstance()->getProductsByStrength($search) !=null)
            {
                $_SESSION["results"] = DataAccess::getInstance()->getProductsByStrength($search);
            }
            else
            {
                $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
            }
        }
        require_once "../View/guest_products_view.php";
    }
    else
    {
        $status = false;
        $passwordStatus = false;
        require_once "../View/guest_products_view.php";
    }
    
    ?>