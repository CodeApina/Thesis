<?php
include "include_master.php";
$post = new product();
$posts = $post->fetch_products();
echo json_encode($posts); ?>