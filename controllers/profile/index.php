<?php

require_once __DIR__ . '../../../classes/Role.php';
require_once __DIR__ . '../../../classes/User.php';
require_once __DIR__ . '../../../classes/Validator.php';

$metaTitle = 'Laboratory Technicians';
$topbarSection = 'Laboratory Technicians · User management';

$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;

$roles = new Role();
$roleList = $roles->allRoles($db);

$user = new User();
$user->getUser($db, $userId);

$users = $user->getAllUsers($db);

$usersCount = count($users);
#dd($users);

### Create variables for users
#dd($firstName);




#dd($_POST);

### Check for request type



#dd(($user->isActive));




require './Storefront/views/page/profile/index.view.php';
