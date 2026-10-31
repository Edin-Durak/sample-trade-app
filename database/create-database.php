<?php

if (php_sapi_name() !== 'cli') {
    die('This script can be started via terminal only!');
}

$config = require __DIR__ . '/../config.local.php';

$host = $config['database']['host'];
$dbname = $config['database']['dbname'];
$username = $config['database']['user'];
$password = $config['database']['password'];
$charset = $config['database']['charset'];

# Connect to MySQL only — the database may not exist yet
$pdo = new PDO(
    "mysql:host={$host};charset={$charset}",
    $username,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]
);

$pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbname}` CHARACTER SET {$charset}");

echo "Database '{$dbname}' is ready." . PHP_EOL;
