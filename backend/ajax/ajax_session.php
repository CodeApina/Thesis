<?php
include "../include_master.php";
$user_id = $_SESSION["user_id"];
echo json_encode($user_id); ?>