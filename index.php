<?php

require "db.php";

try {
    $sql = "SELECT * FROM post.todos";
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
    <title>Bootstrap 4 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .badge {
            color: white;
        }
        .dropdown-item {
            cursor: pointer;
        }
        .badge-pending {
            background-color: orange;
        }

        .badge-completed {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="mx-4">
            <!-- Brand -->
            <a class="navbar-brand" href="#">TO-DO Web App</a>
        </div>
    </nav>

    <div class="container">
        <div class="py-5">
            <?php require "addModal.php"; ?>
        </div>
        <div class="row">
            <div class="col-12 mx-auto">
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
                            <?php
                                foreach ($todos as $key => $todo) {
                            ?>
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
                                                    <a class="dropdown-item" data-id="<?= $todo['id'] ?>"
                                                       data-target="editTodo" data-todo="<?= $todo['to_do_item'] ?>">
                                                        Edit
                                                    </a>

                                                    <a class="dropdown-item"  data-id="<?= $todo['id'] ?>"
                                                       data-target="deleteTodo">
                                                        Delete
                                                    </a>
                                                    <a class="dropdown-item" data-id="<?= $todo['id'] ?>"
                                                       data-target="markCompleteTodo">
                                                        Mark As Completed
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
        require "editModal.php";
        require "deleteModal.php";
        require "completeModal.php";
    ?>
    <script src="index.js"></script>
</body>
</html>


