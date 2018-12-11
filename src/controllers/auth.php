<?php

use Psr\Http\Message\ServerRequestInterface;


/** arquivo de rotas
 * estes comandos estavam no arquivo /public/index.php
 * foram transferidos para category-costs para organição
 */


$app
    ->get('/login', function() use($app) {
        $view = $app->service('view.renderer');
        return $view->render('auth/login.html.twig');
    }, 'auth.show_login_form')    
    ->post('/login', function(ServerRequestInterface $request) use($app){
        //var_dump($request); die;
        $view = $app->service('view.renderer');
        $auth = $app->service('auth');
        $data = $request->getParsedBody();
        $result = $auth->login($data);
        if(!$result) {
            return $view->render('auth/login.html.twig');
        }
        //redirecionar para category-costs
        return $app->route('category-costs.list');
    }, 'auth.login')
    ->get('/logout', function() use($app) {
        $app->service('auth')->logout();
        return $app->route('auth.show_login_form');
    }, 'auth.logout');
