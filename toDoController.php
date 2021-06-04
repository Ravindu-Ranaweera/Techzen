<?php

require 'config.php';

// Read toDo data
$sql = "SELECT * FROM tbl_toDo";
$result = mysqli_query($conn,$sql);
if($result) {
    $toDoList = mysqli_fetch_all($result ,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 