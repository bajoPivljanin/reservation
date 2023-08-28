<?php 
    require_once "../app/config/config.php";
    require_once "../app/clasess/User.php";
    require_once "../app/clasess/Product.php";
$user = new User();

if($user->is_logged() && $user->is_admin()){
    $product = new Product();
    $product_id = $_GET['product_id'];
    $product->delete($product_id);
    header('location:index.php');
}