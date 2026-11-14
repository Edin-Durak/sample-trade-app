<?php

### Showing edit page for parameters

require_once __DIR__ . '/../../classes/User.php';
require_once __DIR__ . '/../../classes/Validator.php';
require_once __DIR__ . '/../../classes/Parameter.php';

$metaTitle = 'Measuerment parameters';
$topbarSection = 'Measurement Parameters · Parameter form';

#dd($_SESSION);

$userId = $_SESSION['user']['userId'];
$userRole = $_SESSION['user']['userRole'];
global $db;


$user = new User();
$user->getUser($db, $userId);

$editUri = '/parameters/edit';
$requestUri = $_SERVER['REQUEST_URI'];
$parseRequestUri = parse_url($requestUri);

$editUriId = $parseRequestUri['query'];


$parameter = new Parameter();

$parameter->getParameter($db, $editUriId);



$parameterId = $parameter->id;

#dd($parameterId);

### Set default parameter variables to avoid errors on initial load of create

$id = $parameter->id;
$name = $parameter->name;
$shortCode = $parameter->shortCode;
$description = $parameter->description;
$measurementUnit = $parameter->measurementUnit;
$active = $parameter->active;
$minimum = $parameter->minimum;
$maximum = $parameter->maximum;
$createdAt = $parameter->createdAt;
$updatedAt = $parameter->updatedAt;

#dd($minimum);


require './Storefront/views/page/parameters/edit.view.php';
