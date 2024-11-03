<?php
require_once "../Model/Users.php";
require_once "../Model/Products.php";
session_start();
require_once "../Model/DataAccess.php";

$status = false;
$basketCount = 0;
$totalCost = 0;
$quantityStatus = false;
if(!isset($_SESSION["basket"]))
{
    $_SESSION["basket"] = [];
    $_SESSION["customerBasket"] = [];

}
else
{
    if(empty($_SESSION["userDetails"]))
    {
        foreach($_SESSION["basket"] as $basketItemsNumber)
        {
            $basketCount +=$basketItemsNumber->quantity;
            $totalCost +=$basketItemsNumber->cost * $basketItemsNumber->quantity;
        }
        require_once "../View/guestHeaderFragment.php";
        require_once "../View/guestBasketView.php";
    }
    else
    {
        foreach($_SESSION["customerBasket"] as $basketItemsNumber)
        {
            $basketCount +=$basketItemsNumber->quantity;
            $totalCost +=$basketItemsNumber->cost * $basketItemsNumber->quantity;

        }
        if($_SESSION["userDetails"][0]->userType == "Admin")
        {
            require_once "../View/adminHeaderFragment.php";
            require_once "../View/customerBasketView.php";
        }
        else
        {
            require_once "../View/customerHeaderFragment.php";
            require_once "../View/customerBasketView.php";
        }
    }
}




?>