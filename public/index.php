<?php

use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\AuthPlugin;
use SONFin\Plugins\DbPlugin;
use SONFin\Plugins\RoutePlugin;
use SONFin\Plugins\ViewPlugin;
use SONFin\ServiceContainer;
use Zend\Diactoros\Response;
use Psr\Http\Message\RequestInterface;

require_once __DIR__ .'/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function(RequestInterface $request){
    var_dump($request->getUri());die();    
    echo "Hello world, Carlos";
});

$app->get('/home', function(){
    echo "Mostrando a Home!!";
});

/*$app->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
    $response = new Response();
    $response->getBody()->write("response com emmiter do diactoros");
    return $response;
});
*/

$app->start();

