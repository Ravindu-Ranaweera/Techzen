<?php
session_start();

require_once '../config.php';

if (isset($_POST['login'])) {

    //Collect data

    $email = $_POST['email'];
    $password = $_POST['password'];

    //Verify data
    $errors = [];

    if (!verify($email, "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/")) array_push($errors, "Input valid email address");

    if (!empty($errors)) {
        $_SESSION['login-errors'] = $errors;
        header("Location: ../views/login.php");
        die();
    }

    //Sanitize data
    $email = $conn->real_escape_string($email);
    //Password hasing
    $password = md5($conn->real_escape_string($password));

    //Insert into Database
    $sql = "SELECT std_id as id, std_name as name FROM tbl_student WHERE std_email = '$email' AND std_password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {

        $resultSet = $result->fetch_assoc();

        $_SESSION['login-message'] = "Login Succesful";
        $_SESSION['login'] = true;
        $_SESSION['userId'] = $resultSet['id'];
        $_SESSION['userName'] = $resultSet['name'];

        header("Location: todos.php");
        die();
    } else {
        $_SESSION['login-errors'][0] = "Invalid email or password";
        header("Location: ../views/login.php");
        die();
    }
} else {
    echo "Invalid request";
}

function verify($data, $pattern)
{
    if (preg_match($pattern, $data)) return  true;
    return false;
}
