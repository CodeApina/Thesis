<?php
include "../include_master.php";
$cart = new cart();
$cart_items = $cart->fetch_cart_products();
echo json_encode($cart_items); ?>