<?php

$user_id = false;

return [
    '/' => 'controllers/index.php',
    '/profiles' => 'controllers/profile/index.php',
    '/profile' => 'controllers/profile/edit.php',
    '/profile/create' => 'controllers/profile/create.php',
    '/login' => 'controllers/login/index.php',
    '/logout' => 'controllers/logout/index.php',
    '/parameters' => 'controllers/parameters/index.php',
    '/parameters/create' => 'controllers/parameters/create.php',
    '/parameters/edit' => 'controllers/parameters/edit.php'
];
