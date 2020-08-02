<?php

session_start();
require "db.php";

if (isset($_POST['update'])) {
    try {
        $editTodo = [
            "to_do_item" => $_POST['to_do_item'],
            "id" => $_POST['id']
        ];
        /**
         * This is equivalent to
         * UPDATE todos SET to_do_item=:to_do_item WHERE id=:id
         */
        $sql = "UPDATE todos SET to_do_item = :to_do_item WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($editTodo);
        if ($statement->rowCount() == 0) {
            $_SESSION['error'] = "Todo item not updated successfully !!!";
        } else {
            $_SESSION['success'] = "Todo item updated successfully !!!";
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}