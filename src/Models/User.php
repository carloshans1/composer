<?php

/** Informação sobre criação do arquivo
 * User: carlos de oliveira
 * Date: 04/12/2018
 * Time: 15:08 
 **/

namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    /** Segurança - Mass Assignment - Atribuição massiva 
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];
}



