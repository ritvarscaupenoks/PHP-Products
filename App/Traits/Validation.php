<?php

namespace App\Traits;

use App\Core\Database;

trait Validation
{

    public function validate($post)
    {
        $errorMessages = [];
        $sku = isset($post['sku']) ? $post['sku'] : '';
        $name = isset($post['name']) ? $post['name'] : '';
        $price = isset($post['price']) ? $post['price'] : '';
        $type = isset($post['type']) ? $post['type'] : '';
        $special_attribute = isset($post['special_attribute']) ? $post['special_attribute'] : [];

        if (strlen($sku) < 1 || strlen($name) < 1 || strlen($price) < 1 || strlen($type) < 1 || strlen(implode($special_attribute)) < 1) {
            $errorMessages[] = "Please, submit required data!";
        }
        if ($this->ValidateSku($sku)) {
            $errorMessages[] = "Please, provide unique SKU!";
        }
        if (!$this->validatePrice($price) || !$this->validateAttribute($special_attribute)) {
            $errorMessages[] = "Please, provide the data of indicated type!";
        }

        return $errorMessages;
    }

    private function validateSku($sku)
    {
        $prepare = Database::getConnection()->prepare("select * from products where sku = ?");
        $prepare->execute([$sku]);
        if ($prepare->fetch() > 0) {
            return true;
        }
        return false;
    }

    private function validatePrice($price)
    {
        if(!is_numeric($price)) {
            return false;
        }
        return true;
    }

    private function validateAttribute($special_attribute)
    {
        foreach ($special_attribute as $attribute) {
            if(!is_numeric($attribute) && $attribute !== '') {
                return false;
            }
        }
        return true;
    }
    
}
