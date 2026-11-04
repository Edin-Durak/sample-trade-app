<?php

global $db;

require './classes/Validator.php';
require './classes/User.php';

$metaTitle = 'Login to Sample Trade';

### Make variables false by default to avoid errors on Login page.
$email_address = false;
$passowrd = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
        } else {
            header('location: /profile');
            exit();
        }
    }
}

require './Storefront/views/page/login/index.view.php';
