<?php
include "../include_master.php";
$product = new Product();
$products = $product->fetch_products();
echo json_encode($products); ?>