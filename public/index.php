<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\RoutePlugin;
use SONFin\Plugins\ViewPlugin;
use SONFin\ServiceContainer;
use SONFin\Plugins\DbPlugin;

require_once __DIR__ .'/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());


$app->get('/category-costs', function() use($app) {
    $view = $app->service('view.renderer');
    return $view->render('category-costs/list.html.twig');
});

$app->start();


/** Trabalhando como cliente (RequestInterface) 
 * 
 * $app->get('/{name}', function(RequestInterface $request) use($app){
 *    $view = $app->service('view.renderer');
 *    return $view->render('test.html.twig', ['name' => $request->getAttribute('name')]);
 * });
 */ 

/** Trabalhando como Servidor (ServerRequestInterface) 
 * 
 * $app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
 *    $response = new \Zend\Diactoros\Response();
 *   $response->getBody()->write("Resposta com emmiter do diactoros");
 *   return $response;
 * });
 */ 


