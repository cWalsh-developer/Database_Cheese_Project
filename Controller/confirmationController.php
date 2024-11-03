<?php
require_once "../Model/Users.php";
require_once "../Model/Products.php";
require_once "../Model/Orders.php";
session_start();
require_once "../Model/DataAccess.php";

$totalCost = 0;
$totalWeight = 0;
$orderInfo = [];
$basketCount = 0;
$quantityStatus = false;
if(!empty($_SESSION["userDetails"]))
{
    foreach($_SESSION["customerBasket"] as $basketItemsNumber)
    {
        $basketCount +=$basketItemsNumber->quantity;
    }
        $familyName = $_REQUEST["lastName"];
        $givenName = $_REQUEST["firstName"];
        $email = $_REQUEST["checkoutEmail"];
        $addressLineOne = $_REQUEST["addressLineOne"];
        $addressLineTwo = $_REQUEST["addressLineTwo"];
        $postcode = $_REQUEST["checkoutPostcode"];
        $townCity = $_REQUEST["townAndCity"];
        $order = new Orders();
        $order->userId = $_SESSION["userDetails"][0]->userId;
        $order->familyName = htmlentities($familyName);
        $order->givenName = htmlentities($givenName);
        $order->email = htmlentities($email);
        $order->addressLineOne = htmlentities($addressLineOne);
        if(!empty($_REQUEST["addressTwo"]))
        {
            $order->addressLineTwo = htmlentities($addressLineTwo);
        }
        $order->townCity = htmlentities($townCity);
        $order->postcode = htmlentities($postcode);
        DataAccess::getInstance()->insertUserInfoIntoOrder($order);
        $orderId = DataAccess::getInstance()->getAllOrderId();
        $userOrderNo = end($orderId)->orderNo;
    foreach($_SESSION["customerBasket"] as $orderedProducts)
    {
        $totalCost +=$orderedProducts->cost * $orderedProducts->quantity;
        $totalWeight += $orderedProducts->weight * $orderedProducts->quantity;
        $orderInfo [] = $userOrderNo;
        $orderInfo [] = $orderedProducts->cheeseID;
        $orderInfo [] = $orderedProducts->quantity;
        $orderInfo [] = $totalCost;
        $orderInfo [] = $totalWeight;
        DataAccess::getInstance()->insertOrderIntoOrderItems($orderInfo);

        $reduceQantity = DataAccess::getInstance()->getProductsById($orderedProducts->cheeseID);
        $quantityUpdate = new Products();
        $quantityUpdate->quantity = $reduceQantity->quantity - $orderedProducts->quantity;
        $quantityUpdate->cheeseID = $orderedProducts->cheeseID;
        $quantityUpdate->productType = $orderedProducts->productType;
        $quantityUpdate->brand = $orderedProducts->brand;
        $quantityUpdate->cost = $orderedProducts->cost;
        $quantityUpdate->strength = $orderedProducts->strength;
        $quantityUpdate->weight = $orderedProducts->weight;
        $quantityUpdate->countryOfOrigin = $orderedProducts->countryOfOrigin;
        DataAccess::getInstance()->updateProducts($quantityUpdate);

        $orderInfo = null;
        $_SESSION["customerBasket"] = [];
        $basketCount=0;
        $totalCost = 0;
        $totalWeight =0;
    }
    if($_SESSION["userDetails"][0]->userType == "Admin")
    {
        require_once "../View/adminHeaderFragment.php";
        require_once "../View/confirmationView.php";
    }
    else
    {
        require_once "../View/customerHeaderFragment.php";
        require_once "../View/confirmationView.php";
    }
}
else
{
    foreach($_SESSION["basket"] as $basketItemsNumber)
    {
        $basketCount +=$basketItemsNumber->quantity;
    }
    $familyName = $_REQUEST["lastName"];
    $givenName = $_REQUEST["firstName"];
    $email = $_REQUEST["checkoutEmail"];
    $addressLineOne = $_REQUEST["addressLineOne"];
    $addressLineTwo = $_REQUEST["addressLineTwo"];
    $postcode = $_REQUEST["checkoutPostcode"];
    $townCity = $_REQUEST["townAndCity"];

    $order = new Orders();
    $order->familyName = htmlentities($familyName);
    $order->givenName = htmlentities($givenName);
    $order->email = htmlentities($email);
    $order->addressLineOne = htmlentities($addressLineOne);
    if(!empty($_REQUEST["addressTwo"]))
    {
        $order->addressLineTwo = htmlentities($addressLineTwo);
    }
    $order->townCity = htmlentities($townCity);
    $order->postcode = htmlentities($postcode);
    DataAccess::getInstance()->insertUserInfoIntoOrder($order);
    $orderId = DataAccess::getInstance()->getAllOrderId();
    $userOrderNo = end($orderId)->orderNo;
    foreach($_SESSION["basket"] as $orderedProducts)
    {
        $totalCost +=$orderedProducts->cost * $orderedProducts->quantity;
        $totalWeight += $orderedProducts->weight * $orderedProducts->quantity;
        $orderInfo [] = $userOrderNo;
        $orderInfo [] = $orderedProducts->cheeseID;
        $orderInfo [] = $orderedProducts->quantity;
        $orderInfo [] = $totalCost;
        $orderInfo [] = $totalWeight;
        DataAccess::getInstance()->insertOrderIntoOrderItems($orderInfo);

        $reduceQantity = DataAccess::getInstance()->getProductsById($orderedProducts->cheeseID);
        $quantityUpdate = new Products();
        $quantityUpdate->quantity = $reduceQantity->quantity - $orderedProducts->quantity;
        $quantityUpdate->cheeseID = $orderedProducts->cheeseID;
        $quantityUpdate->productType = $orderedProducts->productType;
        $quantityUpdate->brand = $orderedProducts->brand;
        $quantityUpdate->cost = $orderedProducts->cost;
        $quantityUpdate->strength = $orderedProducts->strength;
        $quantityUpdate->weight = $orderedProducts->weight;
        $quantityUpdate->countryOfOrigin = $orderedProducts->countryOfOrigin;
        DataAccess::getInstance()->updateProducts($quantityUpdate);

        $orderInfo = null;
        $_SESSION["basket"] = [];
        $basketCount = 0;
        $totalCost = 0;
        $totalWeight =0;
    }
        require_once "../View/guestConfirmationView.php";
}

?>