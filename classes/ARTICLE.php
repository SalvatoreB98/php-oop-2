<?php

class Article
{
    public $product_id;
    public $productName;
    public $price;
    function __construct($name, $price)
    {
        $this->productName = $name;
        $this->setPrice($price);
    }
    public function setPrice($value)
    {
        $this->price = $value;
    }
    private function setProductID()
    {
        $product_id = rand(0, 1000);
    }
}