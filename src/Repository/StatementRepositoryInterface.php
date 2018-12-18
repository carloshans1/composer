<?php

/** criação repositorio de relacionamento com Banco de
 * User: carlos oliveira 
 * Date: 18/12/2018
 * Time: 09:40
 */

declare(strict_types=1);

namespace SONFin\Repository;

interface StatementRepositoryInterface
{
    public function all(string $dateStart, string $dateEnd, int $userId): array;

}