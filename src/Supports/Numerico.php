<?php

namespace nortedevbr\Supports;

/**
 * Suporte para números
 *
 * @package nortedevbr\Supports
 */
abstract class Numerico
{
    /**
     * @param string $str Remove todos os caracteres diferentes de números
     * @return string
     */
    public static function apenasNumeros(string $str): string
    {
        preg_match_all('/\d+/', $str, $matches);
        return implode('', $matches[0]);
    }
}