<?php




global $db;

require './classes/Validator.php';
require './classes/User.php';

$metaTitle = 'Login to Sample Trade';

### Make variables false by default to avoid errors on Login page.
$email_address = false;
$passowrd = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    #check if email and password are set
    if (!isset($_POST['email_address']) || !isset($_POST['password'])) {

        require './Storefront/views/page/login/index.view.php';
        return;
    }

    $email_address = $_POST['email_address'];
    $passowrd = $_POST['password'];

    $errors = [];

    if (! Validator::string($email_address, 1, 500)) {
        $errors['error_message'] = 'Check email and password fields as they are required';
    }

    if (! Validator::string($passowrd, 1, 500)) {
        $errors['error_message'] = 'Check email and password fields as they are required';
    }

    if (empty($errors)) {
        $user = User::loginAttempt($db, $email_address, $passowrd);


        if (! $user) {
            $errors['error_message'] = 'Email or password is incorrect';
        } elseif (! $user['is_active']) {
            $errors['error_message'] = 'Your account has been deactivated. Please contact support on sample@support.com.';
        } else {
            $userId = $user['id'];
            $userRole = $user['role_id'];


            $_SESSION['user'] = ['userId' => $userId, 'userRole' => $userRole];
            #$_SESSION['id'] = $userId;
            header("location: /profile?id={$userId}");
            exit();
        }
    }
}

require './Storefront/views/page/login/index.view.php';
