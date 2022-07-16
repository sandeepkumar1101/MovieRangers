<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location: login.php');
    exit;
}else{
    $_SESSION['loggedin'] = false;
    $_SESSION['username'] = "";
    header('location: login.php');
    exit;
}

?>