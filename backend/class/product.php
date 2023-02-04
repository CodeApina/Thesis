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
    protected $table = "products";

    function init($conn)
    {
        $this->conn = $conn;
    }

    function fetch_products(){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){
            $all_data[] = $row;
        }
        return $all_data;
    }
}