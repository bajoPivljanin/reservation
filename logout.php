<?php 
    require_once "app/config/config.php";
    require_once "app/clasess/User.php";
    $user = new User();
    $user->logout();
    header('location:login.php');
    exit;