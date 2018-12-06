<?php
declare(strict_types=1);

/** Auth Interface
 * User: Carlos de Oliveira
 * Date: 06/12/2018
 * Time: 17:32
 */

namespace SONFin\Auth;

class Auth implements AuthInterface
{

    public function login(array $credentials):bool
    {
        // TODO: Implement login() method.
    }

    public function check():bool
    {
        // TODO: Implement check() method.
    }

    public function logout():void 
    {
        // TODO: Implement logout() method.
    }   
}