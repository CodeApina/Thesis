<?php
include "../include_master.php";
$product = new product();
$products = $product->fetch_products();
echo json_encode($products); ?>