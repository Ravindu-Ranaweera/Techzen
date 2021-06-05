<?php session_start();  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>Document</title>
</head>
<style>
    .form-group {
        height: 70px;
    }
</style>


<body>
    <div class="container">
        <div class="p-2">
            <form action="../controller/signup.php" method="POST">
                <h2>Sign Up Form</h2>

                <?php if (isset($_SESSION['signup-errors'])) {
                ?>

                    <div class="alert alert-dismissible alert-danger form-group my-0">
                        <?php foreach ($_SESSION['signup-errors'] as $error) {
                            echo "<strong> $error </strong><br/>";
                        } ?>
                    </div>

                <?php
                    unset($_SESSION['signup-errors']);
                }
                ?>

                <div class="form-group">
                    <label for="name" class="form-label mt-4">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4" for='dob'>Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                <div class="form-group">
                    <label for="country" class="form-label mt-4">Country</label>
                    <select class="form-select form-control" id="country" name="country">
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                        <option value="Span">Spain</option>
                        <option value="SriLanka" selected>Sri Lanka</option>
                        <option value="St. Helena">St. Helena</option>
                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Gender</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="m" checked>Male
                        </label>
                        <label class="form-check-label mx-5">
                            <input type="radio" class="form-check-input" name="gender" value="f">Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="form-label mt-4">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Repeat the password" name="confirmPassword">
                </div>
                <br>
                <div class="form-group">
                    <button class=" form-control btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>