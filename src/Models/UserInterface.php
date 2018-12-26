<?php
/**
 * 
 * Informação sobre criação do arquivo
 * User: carlos
 * Date: 11/12/2018
 * Time: 11:33 
 **/

namespace SONFin\Models;


interface UserInterface
{
    public function getId():int;
    public function getFullname():string;
    public function getEmail():string;
    public function getPassword():string;

}

