<?php

### Creating a new parameter

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

$parameter = new Parameter();

#dd($_POST);

### Set default parameter variables to avoid errors on initial load of create

$name = false;
$shortCode = false;
$description = false;
$measurementUnit = false;
$active = false;
$minimum = false;
$maximum = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # check if user is admin and if user is active
    if (!($userRole == 1) && !($user->isActive)) {
        abort(401);
    }

    $errors = [];

    if (isset($_POST['parameter']) && $_POST['parameter'] == 'true') {

        $name = $_POST['name'];
        $shortCode = $_POST['short_code'];
        $description = $_POST['description'];
        $measurementUnit = $_POST['measurement_unit'];
        $active = $_POST['active'];
        $minimum = $_POST['minimum'];
        $maximum = $_POST['maximum'];

        if (! Validator::string($name, 1, 255)) {
            $errors['nameErrorMessage'] = "Check name input. It can't be empty or longer than 255 characters.";
        }

        if (! Validator::string($shortCode, 1, 8)) {
            $errors['shortCodeErrorMessage'] = "Check short code input field. It can't be empty and longer than 8 characters. Uppercase letters and numbers are allowed only.";
        }

        if (! Validator::string($measurementUnit, 1, 32)) {
            $errors['measurementUnitErrorMessage'] = "Check measurement unit input field. It can't be emty or longer than 32 characters.";
        }


        if (empty($errors)) {

            ### If min and max are empty, convert to NULL to prevent errors

            if ($minimum == '') {
                $minimum = null;
            }

            if ($maximum == '') {
                $maximum = null;
            }

            Parameter::createParameter($db, $name, $shortCode, $description, $measurementUnit, $active, $minimum, $maximum);

            header("location: /parameters");
            exit();
        }
    }

    # dd($errors);
}




require './Storefront/views/page/parameters/create.view.php';
