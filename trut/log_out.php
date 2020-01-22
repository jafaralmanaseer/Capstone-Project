<?php 
session_start();
unset($_SESSION['customer_id']);
unset($_SESSION['product_id']);
unset($_SESSION['prvider_id']);

header('location:index.php');
?>