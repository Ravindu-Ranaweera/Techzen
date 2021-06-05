<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    $_SESSION['login-errors'][0] = "Please log in to continue";
    header("Location: ../views/login.php");
    die();
}

require_once "../config.php";

if (isset($_POST['submit'])) {

    if ($_POST['action'] == 'save' || $_POST['action'] == 'update') {
        $data = sanitizeData($conn);
    }

    switch ($_POST['action']) {
        case 'save':
            save($data, $conn);
            break;
        case 'update':
            update($data, (int)$_POST['id'], $conn);
            break;
        case 'delete':
            delete((int)$_POST['id'], $conn);
            break;
    }

    header("Location: todos.php");
    die();
} else {
    echo 'Invalid request';
}

//sanitize data
function sanitizeData($conn)
{
    $data = [];
    //sanitize data
    $title = $conn->real_escape_string($_POST['title']);
    $date = $conn->real_escape_string($_POST['date']);
    $note = $conn->real_escape_string($_POST['note']);
    $id = $conn->real_escape_string(isset($_POST['id']) ? isset($_POST['id']) : 0);

    array_push($data, $title, $date, $note, $id);

    return $data;
}

//save
function save($data, $conn)
{
    $sql = "INSERT INTO tbl_todo (
        title,
        date,
        note
    ) VALUES (
        '$data[0]',
        '$data[1]',
        '$data[2]'
    )";

    if ($conn->query($sql))
        $_SESSION['todos-message'] = "Todo ceated";
    else
        $_SESSION['todos-errors'][0] = "Database error. Try again later.";
}

//update
function update($data, $id, $conn)
{
    $sql = "UPDATE tbl_todo SET
        title = '$data[0]',
        date = '$data[1]',
        note= '$data[2]'
    WHERE
        id = $id
    ";

    if ($conn->query($sql))
        $_SESSION['todos-message'] = "Todo updated";
    else
        $_SESSION['todos-errors'][0] = "Database error. Try again later.";
}

//delete
function delete($id, $conn)
{
    $sql = "DELETE FROM tbl_todo WHERE id = $id";

    if ($conn->query($sql))
        $_SESSION['todos-message'] = "Todo deleted";
    else
        $_SESSION['todos-errors'][0] = "Database error. Try again later.";
}

//inidacte as delete 
// function delete($id, $conn)
// {
//     $sql = "UPDATE tbl_todo SET
//         isDelete= 1
//     WHERE
//         id = $id
//     ";

//     if ($conn->query($sql))
//         $_SESSION['todos-message'] = "Todo deleted";
//     else
//         $_SESSION['todos-errors'][0] = "Database error. Try again later.";
// }

$sql = "SELECT * FROM tbl_todo";

$result = $conn->query($sql);
$_SESSION['view-data'] = $result->fetch_all();

header("Location: ../views/todos.php");
die();
