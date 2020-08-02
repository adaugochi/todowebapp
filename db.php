<?php

$hostname = "localhost";
$username = "root";
$password = "admin";
$dbname = "post";
$dsn = "mysql:host=$hostname;dbname=$dbname";

/**
 * This file Handles Php Data Object connection to Db
 * which can be of any type e.g SQL db and runs commands in init.sl
 */
try {
    $connection = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}