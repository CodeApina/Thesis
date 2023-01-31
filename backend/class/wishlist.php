<?php
class Wishlist extends Sql{
    protected $table = "Wishlist";
    protected $user_id;
    protected $product_id;

    function init($conn)
    {
        $this->conn = $conn;
    }
}