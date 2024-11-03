<?php
class Orders
{
    private $orderNo;
    private $orderDate;
    private $userId;
    private $givenName;
    private $familyName;
    private $email;
    private $addressLineOne;
    private $addressLineTwo;
    private $townCity;
    private $postcode;


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