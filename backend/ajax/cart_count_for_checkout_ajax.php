<?php
include "../include_master.php";
$cart = new Cart();
$user_id = $_SESSION["user_id"];
//$cart_items = $cart->fetch_cart_products($user_id);
echo json_encode($cart->fetch_cart_count($user_id)); ?>