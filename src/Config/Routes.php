<?php

namespace Ci4adminrbac\Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', [
    "namespace" => "Ci4adminrbac\Controllers"
], function (RouteCollection $routes) {
    $routes->get('', 'Home');
});
