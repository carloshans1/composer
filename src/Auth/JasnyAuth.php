<?php
declare(strict_types=1);

/** Auth Interface
 * User: Carlos de Oliveira
 * Date: 07/12/2018
 * Time: 12:50
 */

namespace SONFin\Auth;

use Jasny\Auth\User;
use SONFin\Repository\RepositoryInterface;

class JasnyAuth extends \Jansny\Auth
{
    use Sessions;

    /**
     * @var RepositoryInterface
     */

    private $repository;

    /**
     * JasnyAuth constructor.
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /** Fetch a user by ID
     * 
     * @param int/string $id
     * @return User/null
     */
    protected function fetchUserById($id)
    {
        return $this->repository->find($id,false);
    }

    /** Fetch a user by username
     * 
     * @param string $username
     * @return User/null
     */
    public function fetchUserByUsername($username)
    {
        return $this->repository->findByField('email',$username)[0];
    }

}