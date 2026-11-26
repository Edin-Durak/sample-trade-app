<?php

### Showing edit page for parameters

require_once __DIR__ . '/../../classes/User.php';
require_once __DIR__ . '/../../classes/Validator.php';
require_once __DIR__ . '/../../classes/Parameter.php';

$metaTitle = 'Measuerment parameters';
$topbarSection = 'Measurement Parameters · Parameter form';


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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # check if user is admin and if user is active
    if (!($userRole == 1) && !($user->isActive)) {
        abort(401);
    }

    ### Let's validate errors
    $errors = [];

    ### check type of the request (profile or password)
    ### Profile request
    if (isset($_POST['parameter']) && $_POST['parameter'] == 'true') {

        $name = $_POST['name'];
        $shortCode = $_POST['short_code'];
        $description = $_POST['description'];
        $measurementUnit = $_POST['measurement_unit'];
        $active = $_POST['active'];
        $minimum = $_POST['minimum'];
        $maximum = $_POST['maximum'];

        ### Avoid errors for minimum and maximum if they are empty
        if ($minimum == '') {
            $minimum = $parameter->minimum;
        }

        if ($maximum == '') {
            $maximum = $parameter->maximum;
        }

        if (! Validator::string($name, 1, 255)) {
            $errors['nameErrorMessage'] = "Check name input. It can't be empty or longer than 255 characters.";
        }

        if (! Validator::string($shortCode, 1, 8)) {
            $errors['codeErrorMessage'] = "Check short code input. It can't be empty or longer than 8 characters. Accepts only Uppercase letters and numbers.";
        }

        if (! Validator::string($measurementUnit, 1, 32)) {
            $errors['unitErrorMessage'] = "Check short code input. It can't be empty or longer than 32 characters.";
        }


        if (empty($errors)) {
            Parameter::editParameter($db, $name, $shortCode, $description, $measurementUnit, $active, $minimum, $maximum, $id);

            header("Location: /parameters/edit?{$id}");
            exit();
        }
    }
}


require './Storefront/views/page/parameters/edit.view.php';
