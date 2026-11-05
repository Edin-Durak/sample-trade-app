<?php


# Global variables availible everywhere

$currentPageUri = '/';

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = parse_url($_SERVER['REQUEST_URI']);
    $currentPageUri = $uri['path'];
}

$config = require __DIR__ . '/../config.local.php';

$database = $config['database'];
$username = $database['user'];
$password = $database['password'];

unset($database['user'], $database['password']);

require __DIR__ . '/../database/Database.php';

$db = new Database($database, $username, $password);
