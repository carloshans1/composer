<?php

use Psr\Http\Message\ServerRequestInterface;


/** arquivo de rotas
 * estes comandos estavam no arquivo /public/index.php
 * foram transferidos para category-costs para organição
 */


$app
    ->get('/statements', function() use($app) {
        $view = $app->service('view.renderer');
        return $view->render('statements.html.twig');
    }, 'statements.list');
