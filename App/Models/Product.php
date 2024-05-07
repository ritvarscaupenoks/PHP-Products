<?php

namespace App\Models;

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $special_attribute;

    public function __construct($id, $sku, $name, $price, $type, $special_attribute)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->special_attribute = $special_attribute;
    }

    public abstract function getId();

    public abstract function getSku();

    public abstract function getName();

    public abstract function getPrice();

    public abstract function getType();

    public abstract function getSpecialAttribute();
}
