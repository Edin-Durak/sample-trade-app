<?php

require __DIR__ . '../../classes/User.php';

$metaTitle = 'Sample Trade';

$userId = $_SESSION['id'];
global $db;

$user = new User();

$user->getUser($db, $userId);






require './Storefront/views/page/index.view.php';
