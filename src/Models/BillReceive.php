<?php

/**
 * 
 * Informação sobre criação do arquivo
 * User: carlos de oliveira
 * Date: 28/11/2018
 * Time: 08:31 
 **/

namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;


class BillReceive extends Model
{
    /**
     * 
     * Segurança - Mass Assignment - Atribuição massiva 
     */
    protected $fillable = [
        'date_launch',
        'name',
        'value',
        'user_id'
    ];
}



