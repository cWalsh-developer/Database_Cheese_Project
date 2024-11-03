<?php
require_once "../Model/Users.php";
require_once "../Model/Products.php";
session_start();
require_once "../Model/DataAccess.php";

$basketCount =0;
$quantityStatus = false;
if($_SESSION["userDetails"] !=null)
{
    $_SESSION["userDetails"] = null;
    $_SESSION["customerBasket"] = null;
    $_SESSION["customerPreviousSearch"] = null;
    $status = false;
    $passwordStatus = false;
    foreach($_SESSION["basket"] as $basketItemsCount)
    {
        $basketCount += $basketItemsCount->quantity;
    }
    require_once "../View/guest_products_view.php";

}
else
{
    if(!isset($_SESSION["basket"]))
    {
        $_SESSION["basket"] =[];
        $_SESSION["previousSearch"] =[];
        $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
    }
    $status = false;
    $passwordStatus = false;
    foreach($_SESSION["basket"] as $basketItemsCount)
    {
        $basketCount += $basketItemsCount->quantity;
    }
    require_once "../View/guest_products_view.php";
}


?>