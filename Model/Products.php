<?php
class Products
{
    private $cheeseID;
    private $brand;
    private $productType;
    private $cost;
    private $quantity;
    private $strength;
    private $countryOfOrigin;
    private $weight;

    

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