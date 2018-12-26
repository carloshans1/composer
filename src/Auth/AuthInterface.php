<?php
declare(strict_types=1);

/**
* 
 * Auth Interface
 * User: Carlos de Oliveira
 * Date: 06/12/2018
 * Time: 17:32
 */

namespace SONFin\Auth;

use SONFin\Models\UserInterface;


interface AuthInterface
{

    /**
     * Verifica se a autenticação deu certo 
     */
    public function login(array $credentials):bool;

    /**
     * Metodo para checar 
     */
    public function check():bool;

    /**
     * 
     * Metodo para remover o usuario até que faça o login novamente 
     */
    public function logout():void; 

    /**
     * 
     * Metodo para criptografar a senha 
     */
    public function hashPassword(string $password):string;

    /**
     * 
     * Pega usuario pela autenticação e retorna UserInterface
     */
    public function user(): ?UserInterface;

}
