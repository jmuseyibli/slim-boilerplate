<?php

use Respect\Validation\Validator as validator;

require_once __DIR__ . '/../vendor/autoload.php';
session_start();

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {}

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
        'app' => [
            'name' => getenv('APP_NAME')
        ],
        'views' => [
            'cache' => getenv('VIEW_CACHE_DISABLED') === 'true' ? false : __DIR__ . '/../storage/views'
        ],
        
        'database' => [
            'driver' => getenv('DRIVER'),
            'host' => getenv('HOST'),
            'port' => getenv('PORT'),
            'database' => getenv('DATABASE'),
            'username' => getenv('USERNAME'),
            'password' => getenv('PASSWORD'),
            'charset' => getenv('CHARSET'),
            'collocation' => getenv('COLLOCATION'),
            'prefix' => getenv('PREFIX')
        ],

    ],
]);

$container = $app->getContainer();

require_once __DIR__ . '/database.php';
$app->db = $capsule;

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => $container->settings['views']['cache'],
        'debug' => true,
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Twig_Extension_Debug());
    $view->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
    ]);
    $view->getEnvironment()->addGlobal('flash', $container->flash);
    
    return $view;
};

$container['auth'] = function ($container) {
    return new \App\Auth\Auth;
};

$container['validator'] = function ($container) {
  return new App\Validation\Validator;  
};

$container['flash'] = function ($container) {
    return new Slim\Flash\Messages;
};

$app->add(App\Middleware\ValidationErrorsMiddleware::class);
$app->add(App\Middleware\OldInputMiddleware::class);
validator::with('App\\Validation\\Rules\\');

require_once __DIR__ . '/../routes/web.php';