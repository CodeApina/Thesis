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

    function fetch_cart_products($user_id){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_id=?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){
            $all_data[] = $row;
        }
        if (empty($all_data)){
            $empty = "<div class='container-fluid'>Your cart is empty</div>";
            return $empty;
        }
        $cart_product = new Product;
        foreach ($all_data as $product){
            $cart_products[] = $cart_product->fetch_for_cart($product);
        }
        return $cart_products;
    }
    function add_to_cart($product_id, $user_id){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE  user_id=? AND product_id=?");
        $stmt->bind_param("ss", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->num_rows;
        if ($rows == 0 || $result == null){
            $stmt = $this->conn->prepare("INSERT INTO $this->table (user_id, product_id) VALUES (?,?)");
            $stmt->bind_param("ss", $user_id, $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        else {
                $row = $result->fetch_assoc();
                $num = $row['num_in_cart'] + 1;
                $stmt = $this->conn->prepare("UPDATE $this->table SET num_in_cart=? WHERE user_id=? AND product_id=?");
                $stmt->bind_param("iss", $num, $user_id, $product_id);
                $stmt->execute();
                $result = $stmt->get_result();
                return $result;
        }
    }

    function remove_from_cart($product_id, $user_id){
        $stmt = $this->conn->prepare("SELECT num_in_cart FROM $this->table WHERE user_id=? AND product_id=?");
        $stmt->bind_param("ss", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row["num_in_cart"] > 1)
            {
                $num = $row["num_in_cart"] - 1;
                $stmt = $this->conn->prepare("UPDATE $this->table SET num_in_cart=? WHERE user_id=? AND product_id=?");
                $stmt->bind_param("iss", $num, $user_id, $product_id);
                $stmt->execute();
                $result = $stmt->get_result();
                return $result;
            }
        else {
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE user_id=? AND product_id = ?");
            $stmt->bind_param("ss", $user_id, $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
    }
    function cart_for_order($user_id){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_id=?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){
            $all_data[] = $row;
        }
        $cart_product = new Product;
        foreach ($all_data as $product){
            $cart_products[] = $cart_product->fetch_for_cart($product);
        }
        return $cart_products;
    }
    function fetch_cart_count($user_id){
        $all_data = array();
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_id=?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){
            $all_data[] = $row;
        }
        return $all_data;
    }
    function fetch_cart_total($user_id){
        $cart_items = $this->cart_for_order($user_id);
        $total_price = 0;
        $total_tax_price = 0;
        foreach ($cart_items as $product){
            $stmt = $this->conn->prepare("SELECT num_in_cart FROM $this->table WHERE product_id=?");
            $stmt->bind_param("s", $product['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $amount = $row['num_in_cart'];
            $price = $product['price'];
            $tax = $product['tax'];
            $total_price += $price * $amount;
            $total_tax_price += $price * $amount * $tax;
        }
        $prices = [$total_price,$total_tax_price];
        return $prices;
    }
}