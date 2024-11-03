<?php
    require_once "../Model/Users.php";
    session_start();
    require_once "../Model/DataAccess.php";
    if(!isset($_SESSION["basket"]))
    {
        $_SESSION["basket"] =[];
        $_SESSION["previousSearch"] =[];
        $_SESSION["results"] = DataAccess::getInstance()->getAllProducts();
    }
    $status = false;
    $passwordStatus = false;

    if(isset($_REQUEST["surname"]))
    {
        $familyName = $_REQUEST["surname"];
        $givenName = $_REQUEST["givenName"];
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $addressLineOne = $_REQUEST["addressOne"];
        $addressLineTwo = $_REQUEST["addressTwo"];
        $postcode = $_REQUEST["postcode"];
        $townCity = $_REQUEST["town/city"];

        $customer = new Users();
        $customer->familyName = htmlentities($familyName);
        $customer->givenName = htmlentities($givenName);
        $customer->email = htmlentities($email);
        $customer->password = htmlentities($password);
        $customer->addressLineOne = htmlentities($addressLineOne);
        $customer->addressLineTwo = htmlentities($addressLineTwo);
        $customer->postcode = htmlentities($postcode);
        $customer->townCity = htmlentities($townCity);

        DataAccess::getInstance()->addCustomer($customer);
    }

require_once "../View/register_view.php";

?>