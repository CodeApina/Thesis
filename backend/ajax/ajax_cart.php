<?php include "../include_master.php";
    $user_id = $_SESSION("user_id");
    $product_id = $_POST['product_id'];
    $cart = new Cart();
    $cart->add_to_cart($product_id, $user_id);