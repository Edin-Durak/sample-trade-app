<?php



function routeToController($uri, $routes, $loginUri)
{


    if ($loginUri === parse_url($_SERVER['REQUEST_URI'])['path']) {

        require __DIR__ . '/../' . $routes[$loginUri];
    } elseif ((! isset($_SESSION['id']))) {

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

routeToController($uri, $routes, '/login');
