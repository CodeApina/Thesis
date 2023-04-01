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
 
$order = new Order();
$user_id = $_SESSION["user_id"];
if ($order->order($user_id)){
    $response = "Order successful";
    $txt = "Thank you for your order";
    $user = new User();
    $to = $user->fetch_email($_SESSION['user_id']);
    $subject = "Order confirmation";
    mail($to,$subject,$txt);
}
else
    $response = "Order failed";
echo json_encode($response); ?>