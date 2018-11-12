<?php
/**
 * Created by PhpStorm.
 * User: carlosoliveira
 * Date: 12/11/2018
 * Time: 17:04
 */

namespace SONFin\Plugins;

use SONFin\ServiceContainInterface;

interface PluginInterface
{
    public function register(ServiceContainInterface $container);
}