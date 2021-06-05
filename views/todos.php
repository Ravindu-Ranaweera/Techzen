<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    $_SESSION['login-errors'][0] = "Please log in to continue";
    header("Location: ../views/login.php");
    die();
}

if (isset($_GET['update'])) {
    $todosAction = 'update';

    foreach ($_SESSION['view-data'] as $key => $value) {
        if ($value[0] == $_GET['update']) {
            $updateTodo = $value;
            break;
        };
    }
} else
    $todosAction = "save";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>To Do List</title>
</head>

<body>
    <div class="container p-1">
        <div class="flex-row">
            Login as <?php echo $_SESSION['userName']; ?>
        </div>
    </div>
    <div class="d-flex flex-column">
        <div class="d-flex flex-row">
            <div class="container p-3 ">
                <form action="../controller/mutate-todos.php" class="border" method="post">
                    <h3 class="text-center">To Do List</h3>

                    <!-- Error Log -->
                    <?php if (isset($_SESSION['todos-message'])) {
                    ?>
                        <div class="alert alert-dismissible alert-success form-group my-0">
                            <?php
                            echo "<strong> " . $_SESSION['todos-message'] . " </strong><br/>";
                            unset($_SESSION['todos-message']);
                            ?>
                        </div>
                    <?php }
                    ?>

                    <?php if (isset($_SESSION['todos-errors'])) {
                    ?>
                        <div class="alert alert-dismissible alert-danger form-group my-0">
                            <?php foreach ($_SESSION['todos-errors'] as $error) {
                                echo "<strong> $error </strong><br/>";
                            } ?>
                        </div>
                    <?php
                        unset($_SESSION['todos-errors']);
                    }
                    ?>

                    <!-- End of error log -->

                    <div class="form-group px-5">
                        <label class="form-label mt-4">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="<?php if ($todosAction == 'update') echo $updateTodo[1]; ?>">
                    </div>
                    <div class="form-group px-5">
                        <label class="form-label mt-4">Date of Activity</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $todosAction == 'update' ? date($updateTodo[2]) : date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group px-5">
                        <label for="exampleTextarea" class="form-label mt-4">Enter Your Note</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="note"><?php if ($todosAction == 'update') echo $updateTodo[3]; ?></textarea>
                    </div>
                    <input type="hidden" name="action" value="<?php echo $todosAction; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($_GET['update']) ? $_GET['update'] : 0; ?>">
                    <div class="form-group px-5">
                        <button class=" form-control btn btn-lg btn-<?php echo $todosAction == 'update' ? 'primary' : 'success'; ?> primary text-uppercase" type="submit" name="submit">
                            <?php echo $todosAction; ?>
                        </button>
                    </div>
                </form>
            </div>

            <div class="d-flex flex-row flex-wrap-reverse">
                <?php
                $data = $_SESSION['view-data'];
                foreach ($data as $key => $value) :
                ?>
                    <div class="card text-white bg-dark m-3 " style="max-width: 20rem;">
                        <div class="card-header"><?php echo $value[2]; ?>

                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $value[1]; ?></h4>
                            <p class="card-text"><?php echo $value[3]; ?></p>
                            <form action="todos.php?update=<?php echo $value[0]; ?>" method="post">
                                <input type="hidden" name="action" value="delete">
                                <button class="btn btn-warning" type='submit' name='submit'>Update</button>
                            </form>
                            <form id="delete-<?php echo $value[0]; ?>" action="../controller/mutate-todos.php" method="post">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $value[0]; ?>">
                                <button class="btn btn-danger" type='submit' name='submit'>Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>