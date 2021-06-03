<?php 

$conn = new mysqli('localhost','root','','signup');

if ($conn->connect_error){
	die('Database error:' . $conn->connect_error);
}
?>