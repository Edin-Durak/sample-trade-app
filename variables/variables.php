<?php


# Global variables availible everywhere


$uri = parse_url($_SERVER['REQUEST_URI']);

# We only want path value. To avoid additional querry in uri, we'll target only "path" key from this parse_url array
$currentPageUri = $uri['path'];

### We are making database connection variables accesible globaly
$config = require __DIR__ . '/../config.local.php';

$username = $config['database']['user'];
$password = $config['database']['password'];


# Creating global database variable
require __DIR__ . '/../database/Database.php';

$db = new Database($config, $username, $password);
