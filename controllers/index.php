<?php

require_once __DIR__ . '../../classes/User.php';

$metaTitle = 'Sample Trade';

$userId = $_SESSION['user']['userId'];
global $db;

$user = new User();

$user->getUser($db, $userId);


$isAdmin = false;
if ($user->roleId == 1) {
    $isAdmin = true;
}

$roleType = ($isAdmin) ? 'Administrator' : 'Technician';

$topbarSection = "Dashboard · $roleType overview";


require './Storefront/views/page/index.view.php';
