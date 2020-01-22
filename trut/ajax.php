<?php
	include'includes/connection.php';

	$query ="SELECT price FROM offers WHERE offer_id = '{$_GET['offer_id']}' ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);

	if ($row['price'] > $_GET['price']) {
		echo "<p class='text-success'>Avialable Price</p>";
	}else{
		echo "<p class='text-danger'>Not Avialable Price</p>";

	}



	