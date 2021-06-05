<?php
session_start();

require_once '../config.php';

if (isset($_POST['submit'])) {

    //Collect data

    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //Verify data
    $errors = [];

    if (!verify($email, "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/")) array_push($errors, "Input valid email address");
    if (!verify($password, "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/")) array_push($errors, "Password must be strong");
    if ($password != $confirmPassword) array_push($errors, "Passwords does not match");

    if (!empty($errors)) {
        $_SESSION['signup-errors'] = $errors;
        header("Location: ../views/signup.php");
        die();
    }

    //Sanitize data
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $dob = $conn->real_escape_string($dob);
    $country = $conn->real_escape_string($country);
    $gender = $conn->real_escape_string($gender);
    //Password hasing
    $password = md5($conn->real_escape_string($password));

    //Insert into Database
    $sql = "INSERT INTO tbl_student (
        std_name, 
        std_email, 
        std_dob, 
        std_country, 
        std_gender, 
        std_password
        ) VALUES(
            '$name',
            '$email',
            '$dob',
            '$country',
            '$gender',
            '$password'
        )";

    if ($conn->query($sql)) {
        $_SESSION['signup-message'] = "User ceated Succesfully";
        header("Location: ../views/login.php");
        die();
    } else {
        $_SESSION['signup-errors'][0] = "Database error. Try again later.";
        header("Location: ../views/signup.php");
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
