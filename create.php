<?php

require "db.php";

try {
    // sql to create table and insert record into table
    $sql = file_get_contents("init.sql");
    // use exec() because no results are returned
    $connection->exec($sql);
    echo "Table created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$connection = null;