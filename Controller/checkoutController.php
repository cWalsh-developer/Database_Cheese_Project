<?php
require_once "../Model/Users.php";
require_once "../Model/Products.php";
require_once "../Model/Orders.php";
session_start();
require_once "../Model/DataAccess.php";

$totalCost = 0;
$quantityStatus = false;

if(!empty($_SESSION["userDetails"]))
{
    $basketCount = 0;
    foreach($_SESSION["customerBasket"] as $basketItemsNumber)
    {
        $basketCount +=$basketItemsNumber->quantity;
    }
    if(empty($_SESSION["customerBasket"]))
    {
        $status = "Basket Empty";
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
    else
    {
        if($_SESSION["userDetails"][0]->userType == "Admin")
        {
            require_once "../View/adminHeaderFragment.php";
            require_once "../View/checkoutView.php";
        }
        else
        {
            require_once "../View/customerHeaderFragment.php";
            require_once "../View/checkoutView.php";
        }
    }
}
else
{
    $basketCount = 0;
    foreach($_SESSION["basket"] as $basketItemsNumber)
    {
        $basketCount +=$basketItemsNumber->quantity;
    }
    if(empty($_SESSION["basket"]))
    {
        $status = "Basket Empty";
        require_once "../View/guestHeaderFragment.php";
        require_once "../View/guestBasketView.php";
    }
    else
    {
        require_once "../View/guestHeaderFragment.php";
        require_once "../View/checkoutView.php";
    }
}

?>