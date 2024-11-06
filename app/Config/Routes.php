<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


//category
$routes->get('category', 'Category::index');
$routes->get('category/add', 'Category::add');
$routes->get('category/edit/(:num)', 'Category::edit/$1');
$routes->post('category/save', 'Category::save');
$routes->post('category/save/(:num)', 'Category::save/$1');
$routes->get('category/delete/(:num)', 'Category::delete/$1');

$routes->get('sex', 'Sex::index');
$routes->get('sex/add', 'Sex::add');
$routes->get('sex/edit/(:num)', 'Sex::edit/$1');
$routes->post('sex/save', 'Sex::save');
$routes->post('sex/save/(:num)', 'Sex::save/$1');
$routes->get('sex/delete/(:num)', 'Sex::delete/$1');

service('auth')->routes($routes);
