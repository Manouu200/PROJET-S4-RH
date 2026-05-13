<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to('/login');
});

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');

$routes->group('employee', ['filter' => 'employee'], function ($routes) {
    $routes->get('dashboard', 'EmployeeController::index');
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('employes', 'AdminController::employes');
    $routes->get('departements', 'AdminController::departements');
    $routes->post('departements', 'AdminController::createDepartement');
});

$routes->group('rh', ['filter' => 'rh'], function ($routes) {
    $routes->get('index', 'RhController::index');
});
