<?php
/**
 * Created by PhpStorm.
 * User: carlosoliveira
 * Date: 12/11/2018
 * Time: 12:38
 */

declare(strict_types=1);
namespace SONFin;


interface ServiceContainInterface
{
    // Adicionar um serviço
    public function add(string $name,$service);
    // Adicionar serviço usando estrategia Lazy
    public function addLazy(string $name, callable $callable);
    // Pegar serviço
    public function get(string $name);
    // Ver se tem um serviço;
    public function has(string $name);
}