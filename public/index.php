<?php

use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\RoutePlugin;
use SONFin\Plugins\ViewPlugin;
use SONFin\ServiceContainer;
use SONFin\Plugins\DbPlugin;
use SONFin\Plugins\AuthPlugin;

require_once __DIR__ .'/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin);

//Incluindo o arquivo de rotas
require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';


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


