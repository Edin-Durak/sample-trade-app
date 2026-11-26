<?php

### Showing lists page for parameters

require_once __DIR__ . '/../../classes/User.php';
require_once __DIR__ . '/../../classes/Parameter.php';

$metaTitle = 'Measuerment parameters';
$topbarSection = 'Measurement Parameters · Laboratory configuration';


$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;



$user = new User();
$user->getUser($db, $userId);

### Only admin can visit this page
if ($user->roleId !== 1) {
    abort(401);
}

$parameter = new Parameter();


$parameters = $parameter->getAllarameters($db);

foreach ($parameters as $parameter) {
    $isActive =  $parameter['active'];
}

$parametersCount = count($parameters);

$filter = [
    "active" => 1,
    "role" => "admin"
];

$string = http_build_query($filter, '', '?');



require './Storefront/views/page/parameters/index.view.php';
