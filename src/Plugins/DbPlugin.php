<?php
declare(strict_types=1);
/**
 * User: carlos de oliveira
 * Date: 28/11/2018
 * Time: 08:31
 */

namespace SONFin\Plugins;

use Interop\Container\ContainerInterface;
use SONFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function(ContainerInterface $container){
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new \Twig_Environment($loader);
            return $twig;
        });

        $container->addLazy('view.renderer', function(ContainerInterface $container){
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);
        });
        
    }
    
}
