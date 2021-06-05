<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    $_SESSION['login-errors'][0] = "Please log in to continue";
    header("Location: ../views/login.php");
    die();
}

require_once "../config.php";

$sql = "SELECT * FROM tbl_todo";

$result = $conn->query($sql);
$_SESSION['view-data'] = $result->fetch_all();

header("Location: ../views/todos.php");
die();