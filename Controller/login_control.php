<?php 
session_start();
require_once "../Model/users.php";
require_once "../Model/dataAccess.php";

$status = false;
$admin = 0;

if(isset($_REQUEST["email"]))
{
    $search = $_REQUEST["email"];
    if(empty($search) || $search == "Enter your email")
    {
        $status = true;
        $statusmessage = "Please enter your email";
    }
    else if(!filter_var($search, FILTER_VALIDATE_EMAIL))
    {
        $status = true;
        $statusmessage = "Invalid email";
    }
    $admin = 3;
}



require_once "../View/login_view.php";
?>