<?php

// $router->register([
//     '' => 'controllers/IndexController.php',
//     'about' => 'controllers/AboutController.php',
//     'contactus' => 'controllers/ContactController.php',
//     'orders' => 'controllers/OrderController.php',
//     'customer' => 'controllers/CustomerController.php',
//     'names' => 'controllers/add-name.php',
// ]);

use controllers\PagesController;

$router->get('', [PagesController::class, 'index']);
$router->get('about', [PagesController::class, 'about']);
$router->get('contactus', [PagesController::class, 'contact']);
$router->get('orders', [PagesController::class, 'order']);
$router->get('customer', [PagesController::class, 'customer']);
$router->post('names', [PagesController::class, 'createUser']);
