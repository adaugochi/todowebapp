<?php

session_start();
require "db.php";

try {
    $sql = "SELECT * FROM todos ORDER BY created_at DESC";
    $stmt = $connection->query($sql);
    $todos = [];
    while ($todo = $stmt->fetch()) {
        array_push($todos, $todo);
    }
} catch(PDOException $error) {
    echo $error->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome To Todo App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="public/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">TO-DO Web App</a>
        </div>
    </nav>

    <div class="container">
        <div class="py-5">
            <?php require "addModal.php"; ?>
        </div>

        <?php if(isset($_SESSION["success"])) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> <?php echo $_SESSION["success"]; unset($_SESSION["success"]); ?>
            </div>
        <?php } elseif (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> <?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-12 mx-auto">
                <?php if(sizeof($todos) > 0) { ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>ToDo</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($todos as $key => $todo) { ?>
                                <tr>
                                    <td><?= $key += 1 ?></td>
                                    <td><?= ucwords($todo['to_do_item']) ?></td>
                                    <td>
                                        <span class="badge badge-pill badge-<?= $todo['status'] ?>">
                                            <?= $todo['status'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?= date("F j, Y, g:i a", strtotime(
                                            str_replace('-','/', $todo['created_at']))
                                        ); ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <?php if($todo['status'] === 'pending') { ?>
                                                    <a class="dropdown-item" data-id="<?= $todo['id'] ?>"
                                                       data-target="editTodo" data-todo="<?= $todo['to_do_item'] ?>">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" data-id="<?= $todo['id'] ?>"
                                                       data-target="markCompleteTodo">
                                                        Mark As Completed
                                                    </a>
                                                <?php } ?>
                                                <a class="dropdown-item"  data-id="<?= $todo['id'] ?>"
                                                   data-target="deleteTodo">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                    <div class="text-center">
                        <p>No Todo Item Has Been Added</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        require "editModal.php";
        require "deleteModal.php";
        require "completeModal.php";
    ?>
    <script src="public/index.js"></script>
</body>
</html>


