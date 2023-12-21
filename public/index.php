<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\JobsControllers;
use App\Controllers\LoginController;



$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {

    case 'home':
        $controller = new JobsControllers();
        $controller->selectJobs();
        break;
    case 'addJob':
        echo 'dsc';
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
        // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action
