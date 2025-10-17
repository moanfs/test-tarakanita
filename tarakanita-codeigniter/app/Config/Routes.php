<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Admin\AdminController');
$routes->get('/login', 'Auth\LoginController');
$routes->post('/login', 'Auth\LoginController::attempLogin');
$routes->get('/logout', 'Auth\LoginController::logout');
$routes->get('/', 'admin\HomeController');

$routes->resource('/admin', ['controller' => 'Admin\AdminController']);
$routes->resource('/applicants', ['controller' => 'Admin\ApplicantsController']);
