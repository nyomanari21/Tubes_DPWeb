<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/about', 'Home::about');

// Pengguna
$routes->get('/profile/(:any)', 'Pengguna::profile/$1');
$routes->get('/login', 'Pengguna::viewlogin');
$routes->get('/signup-user', 'Pengguna::viewsignup');
$routes->get('/signup-admin', 'Pengguna::viewsignupadmin');
$routes->get('/logout', 'Pengguna::logout');
$routes->post('/pengguna/save', 'Pengguna::save');
$routes->post('/pengguna/authlogin', 'Pengguna::login');

// Course
$routes->get('/create', 'Course::create');
$routes->post('/course/save/(:num)', 'Course::save/$1');
$routes->get('/course/admin/(:any)/(:any)', 'Course::listAdmin/$1/$2');
$routes->get('/course/(:any)/delete/(:num)', 'Course::delete/$2');
$routes->get('/course/(:any)/update/(:num)', 'Course::update/$2');
$routes->get('/course/(:any)/detail/(:num)/beli', 'Course::viewpayment/$2');
$routes->get('/course/(:any)/detail/(:num)', 'Course::detail/$2');
$routes->get('/course/(:any)', 'Course::list/$1');

// Transaksi
$routes->get('/transaksi/bukti/(:num)', 'Transaksi::bukti/$1');
$routes->get('/transaksi/konfirmasi/(:num)', 'Transaksi::konfirmasi/$1');
$routes->get('/transaksi/payment', 'Transaksi::payment');
$routes->get('/transaksi/afterpayment/(:alpha)', 'Transaksi::afterpayment/$1');
$routes->get('/transaksi/(:any)/(:any)', 'Transaksi::index/$1/$2');
$routes->get('/export/(:any)', 'Transaksi::exportPDF/$1');

// Kontak
$routes->get('/contact', 'Kontak::viewkontak');
$routes->get('/kontak/save', 'Kontak::save');

// Admin
// $routes->get('/create', 'Admin::create');

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
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
