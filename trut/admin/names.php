<?php
$conn = mysqli_connect("localhost","root","","aquamall");

$result = mysqli_query($conn, "SELECT admin_email FROM admin where admin_id={$_GET['admin_id']}");
$row = mysqli_fetch_assoc($result);

echo "<option>{$row['admin_email']}</option>";
