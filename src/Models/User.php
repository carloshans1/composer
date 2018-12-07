<?php

/** Informação sobre criação do arquivo
 * User: carlos de oliveira
 * Date: 04/12/2018
 * Time: 15:08 
 **/

namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;
use Jasny\Auth\User as JasnyUser;

class User extends Model implements JasnyUser
{
    /** Segurança - Mass Assignment - Atribuição massiva 
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    /**
     * Get user id
     * 
     * @return int/string
     */
    public function getId():int
    {
        return (int)$this->id;
    }

    /**
     * Get user's username
     * 
     * @return string
     */
    public function getUsername():string
    {
        return $this->email;
    }

    /**
     * Event called on login.
     * 
     * @return string
     */
    public function getHashedPassword():string
    {
        return $this->password;
    }

    /**
     * Event called on Login.
     * 
     * @return boolean false cancels the login
     */
    public function onLogin()
    {
        // TODO: Implement onLogin() method
    }

    /**
     * Event called on Logout.
     * 
     * @return void
     */
    public function onLogout()
    {
        // TODO: Implement onLogout() method
    }

}



