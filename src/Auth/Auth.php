<?php

/** Auth Interface
 * User: Carlos de Oliveira
 * Date: 06/12/2018
 * Time: 17:32
 */

namespace SONFin\Auth;

class Auth implements AuthInterface
{

    /**
     * @var JasnyAuth
     */
    private $jasnyAuth;

    /**
     * Auth constructor
     */
    public function __construct(JasnyAuth $jasnyAuth)
    {
        $this->jasnyAuth = $jasnyAuth;
    }

    public function login(array $credentials):bool
    {
        list('email' => $email, 'password' => $password) = $credentials;
        return $this->jasnyAuth->login($email, $password) !== null;
    }

    public function check():bool
    {
        // TODO: Implement check() method.
    }

    public function logout(): void 
    {
        // TODO: Implement logout() method.
    }   

    public function hashPassword(string $password): string
    {
        return $this->jasnyAuth->hashPassword($password);
    }   
    
}