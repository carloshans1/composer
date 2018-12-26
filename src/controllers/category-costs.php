<?php

use Psr\Http\Message\ServerRequestInterface;


/**
* 
 * arquivo de rotas
 * estes comandos estavam no arquivo /public/index.php
 * foram transferidos para category-costs para organição
 */


$app
    ->get(
        '/category-costs', function () use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('category-cost.repository');
            $auth = $app->service('auth');
        
            $categories = $repository->findByField('user_id', $auth->user()->getId());     
            return $view->render(
                'category-costs/list.html.twig', [
                'categories' => $categories
                ]
            );
        }, 'category-costs.list'
    )
    
    ->get(
        '/category-costs/new', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render('category-costs/create.html.twig');
        }, 'category-costs.new'
    )

    ->post(
        '/category-costs/store', function (ServerRequestInterface $request) use ($app) {
            //Cadastro de category
            $data = $request->getParsedBody();
            $repository = $app->service('category-cost.repository');
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $repository->create($data);
            //Redireciona pelo metodo redirect no Application.php
            //return $app->redirect('/category-costs');
            return $app->route('category-costs.list');
        }, 'category-costs.store'
    )
    ->get(
        '/category-costs/{id}/edit', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('category-cost.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $category = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'category-costs/edit.html.twig', [
                'category' => $category
                ]
            );
        }, 'category-costs.edit'
    )
    ->post(
        '/category-costs/{id}/update', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('category-cost.repository');
            $id = $request->getAttribute('id');
            /**
        * 
        * Metodo find e findOrFail
             * find faz consulta e findorfail cria uma exceção se não encontrar
             * $category = \SONFin\Models\CategoryCost::find($id);
             */
            $data = $request->getParsedBody();
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $repository->update(
                [
                'id' => $id, 
                'user_id' => $auth->user()->getId()
                ], $data
            );
            return $app->route('category-costs.list');
        }, 'category-costs.update'
    )
    ->get(
        '/category-costs/{id}/show', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('category-cost.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $category = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'category-costs/show.html.twig', [
                'category' => $category
                ]
            );
        }, 'category-costs.show'
    )
    ->get(
        '/category-costs/{id}/delete', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('category-cost.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $repository->delete(
                [
                'id' => $id, 
                'user_id' => $auth->user()->getId()
                ]
            );
            return $app->route('category-costs.list');
        }, 'category-costs.delete'
    );
