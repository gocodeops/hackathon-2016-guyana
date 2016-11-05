<?php

header('Access-Control-Allow-Origin: *');

// require all pakages provided by Composer
require '../vendor/autoload.php';

// require the configs needed to connect to the DB
require 'config.php';

// new Slim App
$app = new \Slim\App;

// include the routes
include 'crud.php';
include 'users.php';
include 'transactions.php';
include 'notifications.php';

// run the application
$app->run();
?>