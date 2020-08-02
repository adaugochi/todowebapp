<?php

require "db.php";
require "addModal.php";

if (isset($_POST['submit'])) {
    try {
        $newTodo = [
            "to_do_item" => $_POST['to_do_item'],
            "created_at" => date("Y-m-d H:i:s")
        ];

        /**
         * This is equivalent to
         * INSERT INTO todos (to_do_item) values (:to_do_item)
         */
        $sql = sprintf (
            "INSERT INTO %s (%s) values (%s)",
            "todos",
            implode(", ", array_keys($newTodo)),
            ":" . implode(", :", array_keys($newTodo))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($newTodo);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}