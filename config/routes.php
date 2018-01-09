<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Authenticator',
    ['path' => '/authenticator'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::plugin(
    'Authenticator',
    ['path' => '/'],
    function (RouteBuilder $routes) {
        $routes->connect('/login', ['controller' => 'AuthUsers', 'action' => 'login']);
        $routes->fallbacks(DashedRoute::class);
    }
);