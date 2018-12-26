<?php

declare(strict_types=1);

/**
* 
 * Informação sobre criação do arquivo
 * User: carlos de oliveira
 * Date: 28/11/2018
 * Time: 08:31
 */ 

namespace SONFin\Plugins;

use Interop\Container\ContainerInterface;
use SONFin\Auth\Auth;
use SONFin\ServiceContainerInterface;
use SONFin\Auth\JasnyAuth;

class AuthPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy(
            'jasny.auth', function (ContainerInterface $container) {
                return new JasnyAuth($container->get('user.repository'));
            }
        );
        $container->addLazy(
            'auth', function (ContainerInterface $container) {
                return new Auth($container->get('jasny.auth'));
            }
        );

    }
    
}
