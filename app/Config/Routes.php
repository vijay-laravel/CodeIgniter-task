<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// app/Config/Routes.php
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/registerProcess', 'Auth::registerProcess');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('profile', 'Profile::index');
$routes->post('profile/update', 'Profile::update');
$routes->get('search', 'Search::index');
$routes->post('search/fetch', 'Search::fetch');


