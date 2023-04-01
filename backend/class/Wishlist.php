<?php

class Wishlist extends Sql{
    protected $table = "wishlist";
    protected $user_id;
    protected $product_id;

    function init($conn)
    {
        $this->conn = $conn;
    }
}