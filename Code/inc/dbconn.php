<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
}
$conn=mysqli_connect("localhost","root","","component");

if (mysqli_connect_errno()) {
	echo "Connect failed: %s\n", mysqli_connect_error($conn);
	exit();
}

?>