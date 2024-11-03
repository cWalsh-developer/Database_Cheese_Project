<?php
require_once "../Model/Users.php";
require_once "../Model/Products.php";
session_start();
require_once "../Model/DataAccess.php";

$quantityStatus = false;
$basketCount = 0;
if(!isset($_SESSION["userDetails"]))
{
    $_SESSION["userDetails"] = [];
    $_SESSION["customerPreviousSearch"] = [];
    $_SESSION["results"] = [];
    $_SESSION["customerBasket"] = [];
    $_SESSION["productUpdate"] = [];
}
else
{
    $basketCount = 0;
    foreach($_SESSION["userDetails"] as $users)
    {
        if($users->userType == "Admin")
        {
            require_once "../View/adminHeaderFragment.php";
            require_once "../View/admin_view.php";
        }
        else if($users->userType == "Customer")
        {
            require_once "../View/customerHeaderFragment.php";
            require_once "../View/customer_products_view.php";
        }
    }
}
$status = false;
$passwordStatus = false;
$admin = 0;

$_SESSION["results"] = DataAccess::getInstance()->getAllProducts();

if (isset($_REQUEST["email"])) {
    $search = $_REQUEST["email"];
    if (empty($search) || $search == "Enter your email") {
        $status = "Please enter your email";
    } else if (!filter_var($search, FILTER_VALIDATE_EMAIL)) {
        $status =  "Invalid email";
    }
    $admin = 3;
    $passwordSearch = $_REQUEST["password"];
    if (empty($passwordSearch)) 
    {
        $passwordStatus = "Please Enter a password";
    }
    else
    {
        $_SESSION["userDetails"] = DataAccess::getInstance()->getUsersByEmail($search);
        if($_SESSION["userDetails"] == null)
        {
            $passwordStatus = "No user found";
        }
        else
        {
            foreach ($_SESSION["userDetails"] as $passwords)
            {
                if($passwords->password == $passwordSearch && $passwords->userType == "Admin")
                {
                    $_SESSION["results"] = DataAccess::getInstance()->getAllAdminProducts();
                    require_once "../View/adminHeaderFragment.php";
                    require_once "../View/admin_view.php";
                }
                else if($passwords->password == $passwordSearch && $passwords->userType == "Customer")
                {
                    require_once "../View/customerHeaderFragment.php";
                    require_once "../View/customer_products_view.php";
                }
                else
                {
                    $passwordStatus = "Incorrect Password";
                    $_SESSION["userDetails"] = null;
                }
            }
        }
    }
}
if($_SESSION["userDetails"] == null)
{
    require_once "../View/login_view.php";
}


?>