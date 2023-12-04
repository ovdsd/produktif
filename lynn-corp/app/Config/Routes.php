<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', function ($routes) {
    $routes->get('/', 'usersController::logout');

    $routes->match(['get', 'post'], 'login', 'usersController::login');
    
    $routes->match(['get', 'post'], 'register', 'usersController::signup');
    
    $routes->get('logout', 'usersController::logout');
    
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('home', 'Home::index');

    // $routes->get('profile', 'usersController::profile');
    $routes->post('update/(:num)', 'usersController::update/$1');
    $routes->get('delete/(:num)', 'usersController::delete/$1');
    $routes->get('clientFetch', 'usersController::clientFetch');
    $routes->get('devFetch', 'usersController::devFetch');
    $routes->post('devFire', 'usersController::fireDev');
    $routes->post('setTheme/(:segment)', 'usersController::setTheme/$1');
    $routes->get('getTheme', 'usersController::checkTheme');
    
    $routes->get('projects', 'ProjectsController::index');
    $routes->get('projectFetch', 'ProjectsController::projectFetch');
    $routes->get('projects/(:num)', 'ProjectsController::show/$1');
    $routes->get('projects/create', 'ProjectsController::create');
    $routes->post('projects/create', 'ProjectsController::store');
    $routes->get('projects/getProjectCounter/(:segment)', 'projectsCounterController::getProjectCounter/$1');
    $routes->get('projects/edit/(:num)', 'ProjectsController::edit/$1');
    $routes->post('projects/edit/(:num)', 'ProjectsController::update/$1');
    $routes->get('projects/delete/(:num)', 'ProjectsController::delete/$1');
    $routes->post('projects/update', 'projectsController::updatePayment');
    $routes->post('projects/updateProject', 'projectsController::updateProject');

    $routes->get('ru', 'recentUpdatesController::index');
    $routes->post('ru', 'recentUpdatesController::create');

});
