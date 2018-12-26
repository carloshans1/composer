<?php
declare(strict_types=1);
/**
 * Created by PHP.
 * User: carlosoliveira
 * Date: 22/11/2018
 * Time: 15:18
 */

namespace SONFin\Plugins;

use Interop\Container\ContainerInterface;
use SONFin\ServiceContainerInterface;
use SONFin\View\ViewRenderer;
use SONFin\View\Twig\TwigGlobals;

class ViewPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy(
            'twig', function (ContainerInterface $container) {
                $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
                $twig = new \Twig_Environment($loader);

                $auth = $container->get('auth');

                $generator = $container->get('routing.generator');
                //Veriavel global no template TwigGlobals
                $twig->addExtension(new TwigGlobals($auth));
                $twig->addFunction(
                    new \Twig_SimpleFunction(
                        'route', 
                        function (string $name, array $params = []) use ($generator) {
                            return $generator->generate($name, $params);
                        }
                    )
                );
                return $twig;
            }
        );

        $container->addLazy(
            'view.renderer', function (ContainerInterface $container) {
                $twigEnviroment = $container->get('twig');
                return new ViewRenderer($twigEnviroment);
            }
        );
        
    }
    
}
