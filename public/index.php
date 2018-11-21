<?php

use SONFin\Application;
use SONFin\Plugins\RoutePlugin;
use SONFin\ServiceContainer;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ .'/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function(){
    //var_dump($request->getUri());die();    
    echo "Hello world, Carlos";
});

$app->get('/home', function(){
    echo "Mostrando a Home!!";
    echo "<br/>";
    //echo $request->getAttribute('name');
    //echo "<br/>";
    //echo $request->getAttribute('id');
});

$app->start();

