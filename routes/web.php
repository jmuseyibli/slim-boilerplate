<?php

use App\Controllers\MainController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;


//    Routes where authentication does not matter should be placed inside this group
$app->get('/', MainController::class . ':home')->setName('home');

$app->group('auth', function() use ($app) {
    //    Routes where require the user to be authenticated should be placed inside this group
})->add(new AuthMiddleware($container));

$app->group('/auth', function() use ($app) {
    //    Routes where require the user to be not authenticated should be placed inside this group
})->add(new GuestMiddleware($container));