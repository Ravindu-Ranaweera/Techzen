<?php 

$conn = new mysqli('localhost','root','','CRUD');

if ($conn->connect_error){
	die('Database error:' . $conn->connect_error);
}
?>