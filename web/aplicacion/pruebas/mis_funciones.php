<?php

const MIA=56;

/**
 * Función que devuelve un número
 * Si el número es menor de 10 se dará un error
 *
 * @param integer $num Número al que aplicar el doble
 * @return integer|false Devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false
{
    if($num<10) // Si $num es menor de 10, lo consideramos un error
        return false;
    else
        return 2 * $num;
}

/**
 * Función de ejemplo de clase que
 * recibe varios parámetros, algunos con
 * valores por defecto por si no se reciben
 *
 * @param integer $par1
 * @param string $par2
 * @param float $par3
 * @return integer|float
 */
function variosParametros(int $par1, string $par2="", float $par3=10.0): int|float {
    static $cadena = "";

    $cadena.=$par2;

    if(is_integer($par2)) 
    {
        $par2 = intval($par2);
    }
    else
        $par2 = 0;

    $par3+=$par1+$par2;

    return $par3;
}

/**
 * Función que suma una serie de números
 * pasados por parámetro
 *
 * @param float $a primer número
 * @param float $b segundo número
 * @param float ...$resto resto de números a sumar
 * @return float devuelve un float con el resultado de la suma de todos los parámetros
 */
function suma(float $a, float $b, float ...$resto): float {
    $res = $a + $b;

    foreach($resto as $num) 
    {
        $res += $num;
    }

    return $res;
}

/**
 * Función que suma una serie de números
 * pasados por parámetro
 *
 * @param float $a primer número
 * @param float $b segundo número
 * @param float ...$resto resto de números a sumar
 * @return float devuelve un float con el resultado de la suma de todos los parámetros
 */
function suma1(float $a, float $b, float ...$resto): float {
    $res = 0;

    for($i=0; $i<func_num_args(); $i++) {
        $res+=func_get_arg($i);
    }

    return $res;
}