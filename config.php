<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'CRUD';


//mysql connector - Regular function
// $conn = mysqli_connect($host, $user, $password, $database);

// if ($conn->connect_error) {
// 	die('Database error:' . $conn->connect_error);
// }

//mysqli_close($conn);



//OOP Method - mysqli
$conn = new mysqli($host, $user, $password, $database);

if (!$conn)
	die("Connection failed: " . mysqli_connect_error());
// echo "Connected successfully";


// $conn->close();


// PDO Method
// try {
// 	$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
// 	// set the PDO error mode to exception
// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	echo "Connected successfully";
// } catch (PDOException $e) {
// 	echo "Connection failed: " . $e->getMessage();
// }

// $conn= null;
