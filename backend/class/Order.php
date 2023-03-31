<?php

class Order extends Sql{
    protected $table = "orders";
    protected $table2 = "order_items";

    function init($conn)
    {
        $this->conn = $conn;
    }

    function order($user_id){
        $function = new Cart;
        $cart_items = $function->cart_for_order($user_id);
        $total_price = 0;
        $total_tax_price = 0;
        foreach ($cart_items as $product){
            $price = $product['price'];
            $tax = $product['tax'];
            $total_price += $price;
            $total_tax_price += $price * $tax;
        }
        $stmt = $this->conn->prepare("INSERT INTO $this->table (total_price,total_price_notax,user_id) VALUES (?,?,?)");
        $stmt->bind_param("dis", $total_tax_price, $total_price, $user_id);
        $stmt->execute();
        $id = $stmt->insert_id;
        foreach ($cart_items as $product){
            $stmt = $this->conn->prepare("INSERT INTO $this->table2 (order_id, product_id, product_name, price, tax)
            VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssid", $id, $product["id"],$product["name"],$product["price"],$product["tax"]);
            $stmt->execute();
        }
    }
}