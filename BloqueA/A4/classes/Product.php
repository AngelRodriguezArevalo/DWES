<?php
class Product
{
    public  string $id;
    public  string $name;
    public  float $price;
    public int $stock;

    function __construct(
        string $id, 
        string $name, 
        float $price = 0.0,
        int $stock = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }
}