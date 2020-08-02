<?php

use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;

require_once __DIR__ . '/vendor/autoload.php';

$repository = RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(EnvConstAdapter::class)
    ->addWriter(PutenvAdapter::class)
    ->immutable()
    ->make();

$dotenv = Dotenv::create($repository, __DIR__);
$dotenv->load();

$hostname = getenv('DB_HOSTNAME');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_DATABASE');
$dsn = "mysql:host=$hostname;dbname=$dbname";

/**
 * This file Handles Php Data Object connection to Db
 * which can be of any type e.g SQL db and runs commands in init.sql
 */
try {
    $connection = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}