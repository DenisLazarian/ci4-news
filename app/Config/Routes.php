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

$routes->get('/home', 'Home::index');
$routes->get('/', 'NewsController::listPublishedNews');


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


// $routes->get('/capcha', 'Home::capchaPrueba');

$routes->get('/contact', 'UserController::contact');  // cualquiera puede enviar mesajes

$routes->group('user', function ($routes){
    // $routes->get('user/private', 'UserController::private_dashboard',['filter' => 'auth']);
    //users
    $routes->post('message-contact', 'UserController::contact_post');
    $routes->get('login', 'UserController::login');
    $routes->get('logout', 'UserController::logout');
    
    $routes->post('private', 'UserController::login_post');
    
    $routes->get('register', 'UserController::register');
    $routes->post('save', 'UserController::registerUserPost');

    $routes->get('delete/(:any)', 'UserController::delete/$1', ['filter' => 'auth:admin']);
    $routes->get('edit/(:any)', 'UserController::edit/$1');
    
    $routes->group('',['filter'=> 'auth:admin,editor'], function ($routes){
        $routes->get('list', 'UserController::list');
        $routes->post('update/(:any)', 'UserController::edit_post/$1');
        $routes->post('delete/(:any)', 'UserController::delete/$1',['filter' => 'auth:admin']);
        
        $routes->get('add', 'UserController::addUser', ['filter' => 'auth:admin']);
        $routes->post('insert', 'UserController::addUser_post',['filter' => 'auth:admin']);

    });
    
    // $routes->get('list', 'UserController::list',['filter' => 'auth:admin,editor']);

});

$routes->group('group', ['filter'=> 'auth:admin'], function ($routes){

    $routes->get('list', 'GroupController::list');
    $routes->get('add', 'GroupController::add');

    $routes->post('insert', 'GroupController::addGroup_post');
    $routes->get('edit/(:any)', 'GroupController::edit/$1');

    $routes->post('update/(:any)', 'GroupController::editGroup/$1');
    $routes->post('delete/(:any)', 'GroupController::delete/$1');
});


// la idea es que solo los usuarios con permiso de lectura puedan ver los mensajes publicos

$routes ->group('message',['filter' => 'allow:read'] , function ($routes){ 
    $routes->get('list', 'UserController::listPublicMessages');
    

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
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
