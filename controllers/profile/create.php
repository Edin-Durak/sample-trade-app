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

### Check if user is admin and if not abort(401)
if ($user->roleId == 1) {

    $isAdmin = true;
} else {

    $isAdmin = false;
    abort(401);
}

### Set false variables to avoid error on initial load

$firstName = false;
$lastName = false;
$email = false;
$passowrd = false;
$roleId = false;
$isActive = false;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    ### First check if user is admin

    if (!$isAdmin) {
        abort(401);
    }

    if (isset($_POST['create_profile']) && $_POST['create_profile'] == 'true') {

        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email_address'];
        $passowrd = getRandomString($passowrd, 10);
        $roleId = $_POST['role_id'];
        $isActive = $_POST['is_active'];



        $errors = [];


        if (! Validator::string($firstName, 1, 255)) {
            $errors['nameErrorMessage'] = "Check first name input. It can't be empty or longer than 255 characters.";
        }

        if (! Validator::string($email, 1, 255)) {
            $errors['emailErrorMessage'] = "Check email input. It can't be empty or longer than 255 characters.";
        }

        if (empty($errors)) {

            User::createUser($db, $firstName, $lastName, $email, $passowrd, $isActive, $roleId);

            header('Location: /profiles');
            exit();
        }
    }
}



require './Storefront/views/page/profile/create.view.php';
