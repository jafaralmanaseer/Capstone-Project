<?php
include('../includes/connection.php');


$query  = "DELETE FROM product WHERE product_id = {$_GET['product_id']} ";
$result = mysqli_query($conn, $query);

header("Location: manage_product.php"); /* back to manage admin page */
?>