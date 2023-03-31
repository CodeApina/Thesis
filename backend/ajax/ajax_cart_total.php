<?php include "../include_master.php";
    $user_id = $_SESSION["user_id"];
    $cart = new Cart();
    echo json_encode($cart->fetch_cart_total($user_id));