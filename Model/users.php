<?php
class Users
{
    private $userId;
    private $givenName;
    private $familyName;
    private $email;
    private $password;
    private $userType;
    private $addressLineOne;
    private $addressLineTwo;
    private $postcode;
    private $townCity;

    function __get($name)
    {
        return $this->$name;
    }
    function __set($name, $value)
    {
        $this->$name = $value;
    }
    function getFullName()
    {
        return "$this->familyName, $this->givenName";
    }
}
?>