<?php

require 'config.php';

// Read student  data
$sql = "SELECT * FROM tbl_student";
$result = mysqli_query($conn,$sql);
if($result) {
    $std_details = mysqli_fetch_all($result ,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 