<?php

require_once __DIR__ . '/../classes/User.php';

$user = new User();

### Guard: if the logged-in user was deactivated after login, drop the session and block access.
if (isset($_SESSION['user'])) {

    $userId = $_SESSION['user']['userId'];
    $userRole = $_SESSION['user']['userRole'];
    global $db;

    if (!isUserActive($user, $db, $userId)) {

        unset($_SESSION['user']);
        abort(401);
    }
}


function routeToController($uri, $routes, $loginUri, $logoutUri)
{


    if ($loginUri === parse_url($_SERVER['REQUEST_URI'])['path']) {

        require __DIR__ . '/../' . $routes[$loginUri];
    } elseif ($logoutUri === parse_url($_SERVER['REQUEST_URI'])['path']) {

        require __DIR__ . '/../' . $routes[$logoutUri];
    } elseif ((! isset($_SESSION['user']))) {

        abort(401);
    } elseif (array_key_exists($uri, $routes)) {

        require __DIR__ . '/../' . $routes[$uri];
    } else {

        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require __DIR__ . "/../Storefront/views/page/{$code}/index.view.php";

    die();
}

$uri = $currentPageUri;
$routes = require "routes.php";

routeToController($uri, $routes, '/login', '/logout');
