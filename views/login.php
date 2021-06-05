<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>Sign In</title>
</head>
<style>
    .form-group {
        height: 70px;
    }
</style>


<body>
    <div class="container">
        <form action="../controller/login.php" method="post">
            <h2 class=text-center>Sign In Form</h2>

            <?php if (isset($_SESSION['signup-message'])) {
            ?>
                <div class="alert alert-dismissible alert-success form-group my-0">
                    <?php
                    echo "<strong> " . $_SESSION['signup-message'] . " </strong><br/>";
                    unset($_SESSION['signup-message']);
                    ?>
                </div>
            <?php }
            ?>

            <?php if (isset($_SESSION['login-errors'])) {
            ?>
                <div class="alert alert-dismissible alert-danger form-group my-0">
                    <?php foreach ($_SESSION['login-errors'] as $error) {
                        echo "<strong> $error </strong><br/>";
                    } ?>
                </div>
            <?php
                unset($_SESSION['login-errors']);
            }
            ?>

            <div class="form-group">
                <label for="email" class="form-label mt-4">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div><br>
            <div class="form-group">
                <button class=" form-control btn btn-lg btn-primary" type="submit" name="login">Sign In</button>
            </div>
        </form>
    </div>
</body>

</html>