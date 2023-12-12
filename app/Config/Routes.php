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
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Main::index');
$routes->get('/login', 'Login::login');
$routes->get('/register', 'Login::register');
$routes->get('/admin', 'Admin\Admin::index', ['filter' => 'auth']);
$routes->get('/admin/admin_list', 'Admin\Admin::show_admin_list', ['filter' => 'auth']);
$routes->get('/admin/admin_list/delete/(:num)', 'Admin\Admin::delete_admin/$1', ['filter' => 'auth']);
$routes->get('/admin/admin_list/reactivate/(:num)', 'Admin\Admin::reactivate_admin/$1', ['filter' => 'auth']);
$routes->get('/blog/(:segment)', 'Blog::view/$1');
$routes->get('/package/(:segment)', 'Package::view/$1');
$routes->get('user/(:num)', 'User::index/$1');
$routes->get('admin/transaction_history', 'Admin/Transaction::index');
$routes->add('email/compose', 'Email::compose');
$routes->post('email/send-email', 'Email::send_email');
$routes->post('/send_email_faq', 'Main::send_email_faq');

$routes->get('/admin/packages/edit/(:num)', 'Admin\Packages::edit_package/$1');
$routes->get('/admin/packages/edit/(:num)', 'Admin\Packages::edit_package/$1');
$routes->get('/admin/packages/delete/(:num)', 'Admin\Packages::delete_package/$1');

$routes->get('/admin/guest_list', 'Admin\GuestList::index');
$routes->get('reset_password/token/(:any)', 'Login::reset_form/$1');
$routes->get('/forgot_password', 'Login::reset_page');
$routes->get('/admin/forgot_password', 'Admin\Login::reset_page');
$routes->get('/admin/reset_password/token/(:any)', 'Admin\Login::reset_form/$1');
$routes->post('/set_new_password', 'Login::reset');
$routes->post('/admin/set_new_password', 'Admin\Login::reset');

$routes->post('/admin/edit-checkin-date', 'Admin\Transaction::edit_checkin_date');



/**
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
