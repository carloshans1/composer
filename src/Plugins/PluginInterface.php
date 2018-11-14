<?php
/**
 * Created by PhpStorm.
 * User: carlosoliveira
 * Date: 12/11/2018
 * Time: 17:04
 */

namespace SONFin\Plugins;

use SONFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}