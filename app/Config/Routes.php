<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// rota para a troca da senha do usuário
$routes->get('/user/change', 'Home::change', ['filter' => 'session']);
$routes->post('/user/change', 'Home::change_save', ['filter' => 'session']);

service('auth')->routes($routes);
