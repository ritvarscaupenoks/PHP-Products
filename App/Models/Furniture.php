<?php

namespace App\Models;

class Furniture extends Product
{
    public function getId()
    {
        return $this->id;
    }
    public function getSku()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price . ' $';
    }
    public function getType()
    {
        return $this->type;
    }
    public function getSpecialAttribute()
    {
        return  "Dimensions: " . $this->special_attribute;
    }
}
