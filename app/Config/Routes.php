<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/', 'Home::index', ['as' => 'home']);

//cu44 routing setting
$routes->get('/cu44', 'Cu44::index', ['as' => 'cu44']);
$routes->get('/cu44/create', 'Cu44::create');
$routes->get('/cu44/preparation', 'Cu44::preparation');
$routes->delete('/cu44/(:num)', 'Cu44::delete/$1');
$routes->get('/admin/product/edit/(:any)', 'Product::edit/$1');



// categoris
$routes->get('/categories/ahmcureguler', 'Ahmcureg::index',  ['as' => 'ahmcureg']);
$routes->get('/categories/ahmcuspo', 'Ahmcuspo::index', ['as' => 'ahmcuspo']);
$routes->get('/categories/hti', 'Hti::index', ['as' => 'hti']);
$routes->get('/categories/adptw', 'Adptw::index', ['as' => 'adptw']);
$routes->get('/categories/export', 'Export::index', ['as' => 'export']);
$routes->get('/categories/kawasakicdi', 'Kawasakicdi::index', ['as' => 'kmicdi']);

//produk routes
$routes->get('/admin/product', 'Product::index', ['as' => 'product']);
$routes->get('/admin/product/create', 'Product::create');
$routes->get('/admin/product/edit/(:any)', 'Product::edit/$1');
$routes->delete('/admin/product/(:num)', 'Product::delete/$1');

//member routes
$routes->get('/admin/member', 'Member::index');
$routes->get('/admin/member/edit/(:any)', 'Member::edit/$1');
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
