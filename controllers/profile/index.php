<?php


require __DIR__ . '../../../classes/User.php';

$metaTitle = 'My profile';


$userId = $_SESSION['id'];
global $db;

$user = new User();

$user->getUser($db, $userId);



require './Storefront/views/page/profile/index.view.php';
