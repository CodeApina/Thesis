<?php
session_reset();
session_start();
if ($_SESSION["logged_in"] != true){
    $_SESSION["logged_in"] = false;
}
spl_autoload_register(function($class){
    include "class/".$class.".php";
});
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
