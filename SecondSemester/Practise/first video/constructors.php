<?php

class Product
{
    

    public function __construct (public $name='soap',public $price=100)
    {
        
    }

    public function PriceAsCurency ($divisor=1, $currencySymbol = '$' )
    {
        $priceAsCurency = $this->price/$divisor;

        return $priceAsCurency . $currencySymbol;
    }
}

$product= new Product();

print $product->name . PHP_EOL;
print $product->price;