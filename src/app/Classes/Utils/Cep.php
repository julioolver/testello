<?php

namespace App\Classes\Utils;

/**
 * Classe para manipulação de dados do CEP
 * 
 * @package Utils
 * @author Julio Cesar
 */
class Cep
{
    /**
     * Método responsável por remover a mask do CEP
     * 
     * @param string $cep
     * 
     * @return string
     */
    public static function removeMask(string $cep): string
    {
        return Mask::removeMask($cep);
    }
}