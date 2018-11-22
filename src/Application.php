<?php
/**
 * Created by PhpStorm.
 * User: carlosoliveira
 * Date: 12/11/2018
 * Time: 14:59
 */

declare(strict_types=1);

namespace SONFin;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use SONFin\Plugins\PluginInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\Response\SapiEmitter;

class Application
{
    private $serviceContainer;
    /**
     * Application constructor.
     * @param $serviceContainer  
     */
    
    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service($name)
    {
        return $this->serviceContainer->get($name);
    }

    public function addService(string $name, $service): void
    {
        if(is_callable($service)) {
            $this->serviceContainer->addLazy($name, $service);
        } else {
            $this->serviceContainer->add($name, $service);
        }
    }

    public function plugin(PluginInterface $plugin): void
    {
        $plugin->register($this->serviceContainer);
    }

    public function get($path, $action, $name = null): Application
    {
        $routing = $this->service('routing');
        $routing->get($name, $path, $action);
        return $this;
    }

    public function start(): void
    {
        $route = $this->service('route');
        /**
         * @var ServerRequestInterface $request
         */
        $request = $this->service(RequestInterface::class);

        if (!$route) {
            echo "Página não encontrada";
            exit;
        }

        foreach ($route->attributes as $key => $value) {
            $request = $request->withAttribute($key, $value);
        }

        $result = $this->runBefores();
        if ($result) {
            $this->emitResponse($result);
            return;
        }

        $callable = $route->handler;
        $response = $callable($request);
        $this->emitResponse($response);
    }
}