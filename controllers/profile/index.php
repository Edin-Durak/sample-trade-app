<?php

require __DIR__ . '../../../classes/Role.php';
require __DIR__ . '../../../classes/User.php';

$metaTitle = 'My profile';


$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;

$roles = new Role();
$roleList = $roles->allRoles($db);

$user = new User();
$user->getUser($db, $userId);



require './Storefront/views/page/profile/index.view.php';
