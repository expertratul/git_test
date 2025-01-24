<?php


use Config\Database;
use Api\TaskApi\task;
use Api\TaskApi\Router;



require_once "./vendor/autoload.php";

//database Initialization

$db = new Database();
$conn = $db->getConnection();
$task = new task($conn);
$router = new Router($task);


//Handle Request

$router->handleRequest();

$conn->close();