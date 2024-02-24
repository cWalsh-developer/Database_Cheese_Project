<?php
class Products
{
    private $id;
    private $brandName;
    private $cheeseType;
    private $cost;
    

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