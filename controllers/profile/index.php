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

### Only admin can visit this page
if ($user->roleId !== 1) {
    abort(401);
}

$users = $user->getAllUsers($db);

$usersCount = count($users);
$allUsersCount = $usersCount;

$activeUsers = $user->getAllActiveUsers($db, 1);
$activeUsersCount = count($activeUsers);

$inactiveUsers = $user->getAllActiveUsers($db, 0);
$inactiveUsersCount = count($inactiveUsers);

$params = [];


### Default filter values (shown before any GET submit)
$activeFilter = 'all';
$searchFilter = '';
$roleFilter = 'all';

### Filter users

if (isset($_GET['search']) && $_GET['search'] == 'true') {
    if (!($user->isActive) || ($user->roleId !== 1)) {
        abort(401);
    }

    $params = $_GET;
    unset($params['search']);

    $activeFilter = $params['is_active'] ?? 'all';
    $searchFilter = $params['q'] ?? '';
    $roleFilter = $params['role_id'] ?? 'all';

    #dd($params);

    ### For filtering all search and role users without active filter
    ### remove activeFilter param
    $newParams = array_diff_key($params, ['is_active' => '']);

    ### Get all users by filtering all params
    $users = $user::filterUsers($db, $params)->get();

    ### Get all users by filtering without activeFilter
    $allUsers = $user::filterUsers($db, $newParams)->get();

    $usersCount = $user::countUsers($users);

    ### Get all active users inside current filter
    $activeUsersCount = $user::countUsers($allUsers, 1);

    ### Get all inactive users inside current filter
    $inactiveUsersCount = $user::countUsers($allUsers, 0);

    ### Get all users inside current filter
    $allUsersCount = $user::countUsers($allUsers);
}

### Bulk Edit of a user

# Current page URI to keep filters active on Bulk Edit
$currentPageUri = $_SERVER['REQUEST_URI'];

if (isset($_POST['bulk_edit']) && $_POST['bulk_edit'] == 'true') {
    if (!($user->isActive) || ($user->roleId !== 1)) {
        abort(401);
    }

    $params = $_POST;

    User::bulkEdit($db, $params);

    header("Location: $currentPageUri");
    exit();
}


require './Storefront/views/page/profile/index.view.php';
