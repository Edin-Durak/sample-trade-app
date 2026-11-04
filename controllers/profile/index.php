<?php


$metaTitle = 'My profile';

global $db;


$user_id = $_SESSION['id'];
$userData = $db->querry('SELECT * FROM users WHERE id = :id', ['id' => $user_id])->find();


### Extract values into variables

$userId = $userData['id'];
$userFirstName = $userData['first_name'];
$userLastName = $userData['last_name'];
$userEmail = $userData['email_address'];
$userPassword = $userData['password'];
$userIsActive = $userData['is_active'];
$userRoleId = $userData['role_id'];
$userCreatedAt = $userData['created_at'];
$userUpdatedAt = $userData['updated_at'];

require './Storefront/views/page/profile/index.view.php';
