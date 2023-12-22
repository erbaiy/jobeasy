<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\JobsControllers;
// use App\Controller\UsersController;


$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {

    case 'home':
        $controller = new App\Controllers\JobsControllers();
        $controller->home();
        break;
    case 'apply':
        $controller = new App\Controllers\JobsControllers();
        $controller->apply();
        break;
    case 'offre':
        $controller = new App\Controllers\JobsControllers();
        $controller->offre();
        break;
    case 'acseptapplay':
        $controller = new App\Controllers\JobsControllers();
        $controller->acseptapplay();
        break;
    case 'search':
        $controller = new App\Controllers\JobsControllers();
        $controller->search();
        break;
    case 'selectJobs':
        $controller = new App\Controllers\JobsControllers();
        $controller->selectJobs();
        break;

    case 'register':
        $controller = new App\Controllers\UsersController();
        $controller->register();
        break;
    case 'login':
        $controller = new App\Controllers\UsersController();
        $controller->loginURL();
        break;
    case 'getlogin':
        $controller = new App\Controllers\UsersController();
        $controller->login();
        break;
    case 'logout':
        $controller = new App\Controllers\UsersController();
        $controller->logout();
        break;



    case 'addJob':

        $controller = new JobsControllers();
        $controller->AddJob();
        break;
    case 'DeleteJob':
        $logincontroller = new JobsControllers();
        $logincontroller->DeleteJob();
        break;
    case 'SelcectData':
        $logincontroller = new JobsControllers();
        $logincontroller->SelcectData();
        break;
    case 'UpdateJob':
        $logincontroller = new JobsControllers();
        $logincontroller->UpdateJob();
        break;
        //_____
    case 'dasboard':
        $logincontroller = new JobsControllers();
        $logincontroller->dasboard();
        break;
    case 'candidat':
        $logincontroller = new JobsControllers();
        $logincontroller->condidat();
        break;
    case 'contact':
        $logincontroller = new JobsControllers();
        $logincontroller->contact();
        break;
        // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action
