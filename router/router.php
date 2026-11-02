<?php



function routeToController($uri, $routes)
{

    if (array_key_exists($uri, $routes)) {
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

routeToController($uri, $routes);
