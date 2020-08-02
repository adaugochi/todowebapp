<?php

session_start();
require "db.php";

if (isset($_POST['delete'])) {
    try {
        $deleteTodo = [
            "id" => $_POST['id']
        ];

        $sql = "DELETE FROM todos WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute($deleteTodo);
        if ($statement->rowCount() == 0) {
            $_SESSION['error'] = "Todo item not deleted successfully !!!";
        } else {
            $_SESSION['success'] = "Todo item deleted successfully !!!";
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}