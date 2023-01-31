<?php
class Product extends Sql{
    protected $id;
    protected $name;
    protected $description;
    protected $price; 
    protected $tax;
    protected $stock;
    protected $available;
    protected $times_ordered;
    protected $category;
    protected $table = "Products";

    function init($conn)
    {
        $this->conn = $conn;
    }
}