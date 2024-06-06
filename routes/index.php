<?php

// Create Router instance
$router = new \Bramus\Router\Router();

//Defỉn routes
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/client.php';

// Run it!
$router->run();