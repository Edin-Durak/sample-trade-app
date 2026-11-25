<?php

### Showing lists page for parameters

require_once __DIR__ . '/../../classes/User.php';
require_once __DIR__ . '/../../classes/Parameter.php';

$metaTitle = 'Measuerment parameters';
$topbarSection = 'Measurement Parameters · Laboratory configuration';

#dd($_SESSION);

$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;



$user = new User();
$user->getUser($db, $userId);

$parameter = new Parameter();


$parameters = $parameter->getAllarameters($db);

foreach ($parameters as $parameter) {
    $isActive =  $parameter['active'];
}

$parametersCount = count($parameters);
#dd($parametersCount);

$filter = [
    "active" => 1,
    "role" => "admin"
];

$string = http_build_query($filter, '', '?');

#dd($string);


require './Storefront/views/page/parameters/index.view.php';
