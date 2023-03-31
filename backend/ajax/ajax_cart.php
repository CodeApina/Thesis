<?php include "../include_master.php";
    $user_id = $_SESSION["user_id"];
    $product_id = json_decode($_POST['id']);
    $cart = new Cart();
    echo json_encode($cart->add_to_cart($product_id, $user_id));