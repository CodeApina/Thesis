<?php
session_start();
if ($_SESSION["logged_in"] != true){
    $_SESSION["logged_in"] = false;
}
spl_autoload_register(function($class){
    include "class/".$class.".php";
});