<?php
class Products
{
    private $cheeseID;
    private $brand;
    private $productType;
    private $cost;
    private $quantity;
    private $strength;

    

    function __get($name)
    {
        return $this->$name;
    }
    function __set($name, $value)
    {
        $this->$name = $value;
    }
}
?>