<?php

declare(strict_types=1);

namespace App\Classes\Utils;

/**
 * Classe para manipulação de dados dos Valores de frete
 * @author Julio Cesar <juliocesar.olver@gmail.com>
 */
class Rate
{
    /**
     * Converte um filed de String para Float.
     * 
     * @param float|string $value
     * @param string $search
     * @param mixed '
     * @param string $replace
     * 
     * @return float
     */
    public static function convertStrToFloat(float|string $value, string $search = ',', string $replace = '.'): float
    {
        if (is_float($value)) {
            return $value;
        }

        return (float) str_replace($search, $replace, $value);
    }

    public static function removeMask(string $value): string
    {
        return Mask::removeMask($value);
    }
}
