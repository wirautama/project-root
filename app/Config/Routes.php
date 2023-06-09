<?php

namespace Config;

use App\Controllers\RestClient;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// API KOMIK
$routes->get('/Api/Komik', 'Apikomik::index');
$routes->post('/Api/Komik', 'Apikomik::create');
$routes->get('/Api/Komik/(:any)', 'Apikomik::show/$1');
$routes->put('/Api/Komik/(:num)', 'Apikomik::update/$1');
$routes->delete('/Api/Komik/(:num)', 'Apikomik::delete/$1');

$routes->get('/otentikasi', 'otentikasi::index');
$routes->post('/otentikasi', 'otentikasi::index');

$routes->get('/RestClient/Komik', 'RestClient::index');
$routes->post('/RestClient/Komik', 'RestClient::index');
// 

$routes->group('', ['filter' => 'login'], function ($routes) {

    $routes->get('/', 'Home::index');

    $routes->get('/Profile', 'Profile::index');
    $routes->get('/Profile/edit/(:segment)', 'Profile::edit/$1');
    $routes->post('/Profile/update/(:num)', 'Profile::update/$1');

    $routes->get('/ChangePassword/(:segment)', 'ChangePassword::ubahPassword/$1');
    $routes->post('/ChangePassword/(:num)', 'ChangePassword::updatePassword/$1');

    $routes->get('/User', 'User::index');
    $routes->get('/User/edit/(:segment)', 'User::edit/$1');
    $routes->post('/User/update/(:num)', 'User::update/$1');

    $routes->get('/Group', 'Group::index');
    $routes->get('/Group/new', 'Group::new');
    $routes->post('/Group/create', 'Group::create');
    $routes->get('/Group/edit/(:segment)', 'Group::edit/$1');
    $routes->put('/Group/update/(:num)', 'Group::update/$1');

    $routes->get('/Komik', 'Komik::index');
    $routes->get('/Komik/create', 'Komik::create');
    $routes->post('/Komik/save', 'Komik::save');
    $routes->get('/Komik/detail/(:any)', 'Komik::detail/$1');
    $routes->get('/Komik/edit/(:segment)', 'Komik::edit/$1');
    $routes->put('/Komik/update/(:num)', 'Komik::update/$1');
    $routes->delete('/Komik/delete/(:num)', 'Komik::delete/$1');




    $routes->get('/Permissions', 'Permission::index');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.`
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
