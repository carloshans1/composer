<?php
/**
 * Created by PhpStorm.
 * User: carlosoliveira
 * Date: 13/11/2018
 * Time: 16:45
 */

namespace SONFin\Plugins;


use SONFin\ServiceContainInterface;

class RoutePlugin implements PluginInterface
{

    public function register(ServiceContainInterface $container)
    {
        $routerContainer = new RouterContainer();
        /* Registrar as rotas da aplicação */
        $map = $routerContainer->getMap();
        /* Tem a função de identificar a rota que está sendo acessado */
        $matcher = $routerContainer->getMatcher();
        /* Tem a função de gerar links com base nas rotas registradas */
        $generetor = $routerContainer->getGenerator();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generetor);
    }
}