<?php

class Product
{
    public $name;
    public $price=100;

    public function PriceAsCurency ($divisor=1, $currencySymbol = '$' )
    {
        $priceAsCurency = $this->price/$divisor;

        return $priceAsCurency . $currencySymbol;
    }
}

$product= new Product;
print $product->PriceAsCurency(currencySymbol:'đ');