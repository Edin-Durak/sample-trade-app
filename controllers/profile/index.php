<?php

require __DIR__ . '../../../classes/Role.php';
require __DIR__ . '../../../classes/User.php';
require __DIR__ . '../../../classes/Validator.php';

$metaTitle = 'My profile';


$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;

$roles = new Role();
$roleList = $roles->allRoles($db);

$user = new User();
$user->getUser($db, $userId);

### make variables first, so we don't have an error when loading profile page
$firstName = $user->firstName;
$lastName = $user->lastName;
$email = $user->email;
$userId = $user->id;
$passowrd = $user->password;


#dd($_POST);

### Check for request type



#dd(($user->isActive));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    ## IF user is not active, abort
    if ($user->isActive === 0) {
        abort(401);
    }

    ### Let's validate errors
    $errors = [];

    ### check type of the request (profile or password)
    ### Profile request
    if (isset($_POST['profile']) && $_POST['profile'] == 'true') {




        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        if ($userRole === 1) {
            $email = $_POST['email'];
        }

        if (! Validator::string($firstName, 1, 255)) {
            $errors['profileErrorMessage'] = "Check first name input. It can't be empty or longer than 255 characters.";
        }

        if (! Validator::string($email, 1, 255)) {
            $errors['profileErrorMessage'] = "Check email input. It can't be empty or longer than 255 characters.";
        }


        if (empty($errors)) {
            User::editProfile($db, $firstName, $lastName, $email, $userRole, $userId);

            header('Location: /profile');
            exit();
        }
    }

    ### password request
    if (isset($_POST['password']) && $_POST['password'] == 'true') {

        $passowrd = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if (! Validator::string($newPassword, 1, 255)) {
            $errors['passwordErrorMessage'] = "Password is required. Max number of characters is 255.";
        } elseif (! Validator::string($confirmPassword, 1, 255)) {
            $errors['passwordErrorMessage'] = "Password is required. Max number of characters is 255.";
        } elseif (! ($newPassword === $confirmPassword)) {
            $errors['passwordErrorMessage'] = 'Passwords do not match. Please try again.';
        } elseif (empty($errors)) {
            User::editPassword($db, $newPassword, $userId);

            header('Location: /profile');
            exit();
        }

        #dd($_POST);
    }
}


require './Storefront/views/page/profile/index.view.php';
