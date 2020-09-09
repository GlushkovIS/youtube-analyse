<?php

use Controllers\ElasticSearchController;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'bootstrap/app.php';

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['PWD']);
$dotenv->load();

$run = new ElasticSearchController();
