<?php

namespace Ci4adminrbac\Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', [
    'namespace' => 'Ci4adminrbac\Controllers\Admin',
    'filter' => 'redirectIfNotAuthenticated'

], function (RouteCollection $routes) {
    $routes->get('logout', 'Logout', []);

    $routes->get('', 'Dashboard', ['as' => 'dashboard']);
    $routes->get('dashboard', 'Dashboard', []);

    $routes->group('user', [
        'namespace' => 'Ci4adminrbac\Controllers\Admin\User',

    ], function (RouteCollection $routes) {

        $routes->group('user', [
            'namespace' => 'Ci4adminrbac\Controllers\Admin\User',

        ], function (RouteCollection $routes) {

            $routes->get('', 'User', []);
            $routes->get('getdata', 'User::getdata', []);

            $routes->get('delete', 'User::delete', []);
            $routes->get('find', 'User::find', []);
            $routes->post('store', 'User::store', []);
        });

        $routes->group('usergroup', [
            'namespace' => 'Ci4adminrbac\Controllers\Admin\User',

        ], function (RouteCollection $routes) {

            $routes->get('', 'Usergroup', []);
            $routes->get('getdata', 'Usergroup::getdata', []);

            $routes->get('create', 'Usergroup::create', []);
            $routes->get('edit/(:num)', 'Usergroup::edit/$1', []);

            $routes->post('store', 'Usergroup::store', []);

            $routes->post('update/(:num)', 'Usergroup::update/$1', []);
            $routes->get('delete', 'Usergroup::delete', []);
        });
    });
});

$routes->group('login', [
    'namespace' => 'Ci4adminrbac\Controllers',
    'filter' => 'redirectIfAuthenticated'

], function (RouteCollection $routes) {

    $routes->get('', 'Login', []);
    $routes->post('', 'Login::verify', []);
});
