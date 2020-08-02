<?php

session_start();
require "db.php";

if (isset($_POST['complete'])) {
    try {
        $markTodo = [
            "status" => "completed",
            "id" => $_POST['id']
        ];

        $sql = "UPDATE todos SET status = :status WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($markTodo);
        if ($statement->rowCount() == 0) {
            $_SESSION['error'] = "Could not mark Todo item as completed !!!";
        } else {
            $_SESSION['success'] = "Todo item mark as completed successfully !!!";
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}