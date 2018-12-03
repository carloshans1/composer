<?php

/** Implementação dos metodos
 * User: carlosoliveira 
 * Date: 03/12/2018
 * Time: 10:20
 */

declare(strict_types=1);

namespace SONFin\Repository;

class DefaultRepository implements RepositoryInterface
{
    /** Declaração variavel
     * @var string
     */
    private $modelClass;
    /**
     * @var Model
     */
    private $model;
    
    /** Passa o nome do modelo - Instancia do model
     * @param string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }
 
    public function all(): array 
    {

    }

    public function create(array $data)
    {

    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }

}



