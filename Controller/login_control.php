<?php
session_start();
require_once "../Model/Users.php";
require_once "../Model/DataAccess.php";

$status = false;
$passwordStatus = false;
$admin = 0;

if(!isset($_SESSION["userDetails"]))
{
    $_SESSION["userDetails"] = [];
}

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
        $passwordResult = DataAccess::getInstance()->getUsers($search);
        if($passwordResult == null)
        {
            $passwordStatus = "This is not an admin user";
        }
        else
        {
            foreach ($passwordResult as $passwords)
            {
                $_SESSION["userDetails"] = $passwords->userType;
                if($passwords->password == $passwordSearch)
                {
                    header("Location: ../Controller/admin_controller.php");
                    exit;
                }
                else
                {
                    $passwordStatus = "Incorrect Password";
                }
            }
        }
    }
}


require_once "../View/login_view.php";
?>