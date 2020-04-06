<?php

namespace Ci4adminrbac\Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', [
    'namespace' => 'Ci4adminrbac\Controllers\Admin',
    'filter' => 'ci4adminrbac-notlogin'
], function (RouteCollection $routes) {


    $routes->get('', 'Home', []);
    $routes->get('logout', 'Logout', []);
    $routes->get('dashboard', 'Dashboard', []);

    $routes->group('user', [
        'namespace' => 'Ci4adminrbac\Controllers\Admin\User',
    ], function (RouteCollection $routes) {

        $routes->group('usergroup', [
            'namespace' => 'Ci4adminrbac\Controllers\Admin\User',
        ], function (RouteCollection $routes) {

            $routes->get('', 'Usergroup', []);
            $routes->get('getdata', 'Usergroup::getdata', []);
        });
    });
});

$routes->group('login', [
    'namespace' => 'Ci4adminrbac\Controllers',
    'filter' => 'ci4adminrbac-haslogin'
], function (RouteCollection $routes) {
    $routes->get('', 'Login', []);
    $routes->post('', 'Login::verify', []);
});
