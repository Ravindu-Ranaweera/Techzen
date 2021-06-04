<?php require_once 'toDoController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>To Do List</title>
</head>

<body>
    <div class="d-flex flex-row">
        <div class="container p-3 ">
            <form action="" class="border">
                <h3 class="text-center">To Do List</h3>
                <div class="form-group px-5">
                    <label class="form-label mt-4">Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group px-5">
                    <label class="form-label mt-4">Date of Activity</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group px-5">
                    <label for="exampleTextarea" class="form-label mt-4">Enter Your Note</label>
                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
                <div class="form-group px-5">
                    <button class=" form-control btn btn-lg btn-primary" type="button">Update</button>
                </div>
            </form>
        </div>

        <div class="d-flex flex-row">
            <?php foreach($toDoList as $key=>$value): //var_dump($value);   ?>
            <div class="card text-white bg-dark m-3 " style="max-width: 20rem;">
                <div class="card-header"><?php echo $value['date']; ?>

                </div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $value['title']; ?></h4>
                    <p class="card-text"><?php echo $value['description']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>



</body>

</html>