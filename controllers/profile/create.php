<?php


require_once __DIR__ . '../../../classes/Role.php';
require_once __DIR__ . '../../../classes/User.php';
require_once __DIR__ . '../../../classes/Validator.php';

$metaTitle = 'Create a new profile';
$topbarSection = 'Laboratory Technicians · Account form';

$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;

$roles = new Role();
$roleList = $roles->allRoles($db);

$user = new User();
$user->getUser($db, $userId);

require './Storefront/views/page/profile/create.view.php';
