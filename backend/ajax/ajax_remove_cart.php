<?php include "../include_master.php";
    $user_id = $_SESSION["user_id"];
    $product_id = $_POST['id'];
    $cart = new Cart();
    echo json_encode($cart->remove_from_cart($product_id, $user_id));