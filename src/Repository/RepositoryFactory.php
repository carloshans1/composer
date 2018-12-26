<?php

/**
 * 
 * Função gerar uma instancia do repositorio
 */

declare(strict_types=1);

namespace SONFin\Repository;

class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }
}
