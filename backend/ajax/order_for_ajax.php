<?php
include "../include_master.php";
$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $unset = 0;
    foreach($_POST as $post){
        if (isset($post) == false)
            $unset++;
    }
        $function = new User();
        $function->address($_POST['address'], $_POST['city'], $_POST['zip']
        , $_POST['country'], $_POST['card_num'], $_POST['expiration'], $_POST['security']);
}
$cart = new Order();
$user_id = $_SESSION["user_id"];
if ($cart->order($user_id)){
    $response = "Order successful";
    $to = $_POST['email'];
    mail($to,$subject,$txt);
}
else
    $response = "Order failed";
echo json_encode($response); ?>