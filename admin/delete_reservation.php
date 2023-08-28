<?php 
require_once "../app/config/config.php";
require_once "../app/clasess/Reservation.php";
require_once "../app/clasess/User.php";
if($user->is_logged() && $user->is_admin()){
    $reservation = new Reservation();
    $reservation = $reservation->delete($_GET['reservation_id']);
    header('location:index.php');
}
else{
    header('location:../reservation.php');
    exit;
}
