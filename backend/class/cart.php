<?php
class Cart extends Sql{
    protected $user_id;
    protected $product_id;
    protected $time_added;
    protected $table = "cart";

    function init($conn)
    {
        $this->conn = $conn;
    }

    function fetch_cart_products(){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){
            $all_data[] = $row;
        }
        foreach($result as $all_data){
            $product = new Product();
            $cart_items[] = $product->fetch_for_cart($result);
        }
        return $cart_items;
    }
    function add_to_cart($product_id, $user_id){
        $stmt = $this->conn->prepare("INSERT INTO $this->table VALUES ($user_id, $product_id)");
    }
}