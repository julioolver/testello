<?php

namespace App\Classes\Utils;

/**
 * Classe para manipulação de dados do CEP
 * 
 * @package Utils
 * @author Julio Cesar
 */
class Mask
{
    /**
     * Método responsável por remover a mask do valor passado por parâmetro.
     * 
     * @param string $value
     * 
     * @return string
     */
    public static function removeMask(string $value): string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}