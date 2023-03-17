<?php

namespace Config;

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');


$routes->group('', function ($routes){
    $routes->get('makeTable', 'NewsController::makeTables');

    $routes->group('', ['filter' =>'auth:admin,reporter'], function ($routes){
        $routes->post('/create','NewsController::add_article',['filter' =>'auth:admin,reporter']);
        $routes->post('delete/(:num)','NewsController::delete_new/$1', ['filter' =>'auth:admin,reporter']);
        
        $routes->group('', ['filter' =>'auth:admin,editor,reporter'], function ($routes){
            
            $routes->get('/list', 'NewsController::list',['filter' =>'auth:admin,editor,reporter']);
            $routes->get('/listCol', 'NewsController::listColumn', ['filter' =>'auth:admin,editor,reporter']);
            $routes->post('/edit/(:num)', 'NewsController::edit_new/$1', ['filter' =>'auth:admin,editor,reporter']);
            
        });
    });
});



$routes->get('/public', 'NewsController::listPublishedNews');
$routes->get('show/(:any)', 'NewsController::new_view/$1');

// $routes->get('/search', 'NewsController:: listPageSearch');


$routes->get('/capcha', 'Home::capchaPrueba');

$routes->get('/contact', 'UserController::contact');

$routes->group('user', ['filter' =>'auth'], function ($routes){

});

// $routes->get('user/private', 'UserController::private_dashboard',['filter' => 'auth']);
//users
$routes->get('user/login', 'UserController::login');
$routes->get('user/logout', 'UserController::logout');

$routes->post('user/private', 'UserController::login_post');

$routes->get('user/register', 'UserController::register');
$routes->post('user/save', 'UserController::registerUserPost');

$routes->get('user/list', 'UserController::list',['filter' => 'auth:admin,editor']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
