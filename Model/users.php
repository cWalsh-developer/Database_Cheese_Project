<?php
class Users
{
    private $id;
    private $givenName;
    private $familyName;
    private $email;
    private $password;
    private $userType;

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