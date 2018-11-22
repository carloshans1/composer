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
$app->plugin(new ViewPlugin());

/* Trabalhando como cliente (RequestInterface)*/
$app->get('/', function(RequestInterface $request) use($app){
    /**
     *  var_dump($request->getUri());die();    
     *  echo "Hello world, Carlos";
     */    

    $view = $app->service('view.renderer');
    return $view->render('teste.html.twig', ['name' => 'Carlos de Oliveira']);
});

/* Trabalhando como Servidor (ServerRequestInterface)*/
$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
    $response = new Response();
    $response->getBody()->write("Resposta com emmiter do diactoros");
    return $response;
});

$app->start();

