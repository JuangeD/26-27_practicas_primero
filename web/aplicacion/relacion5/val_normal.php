<?php

namespace VALNORMAL;

/*====== FUNCIONES ======*/
/**
 * Función que valida si un entero pasado por referencia
 * está entre los valores mínimo y máximo indicados. Si no
 * lo está se le asignará un valor por defecto.
 *
 * @param integer $var entero que se quiere validar
 * @param integer $min valor mínimo
 * @param integer $max valor máximo
 * @param integer $defecto valor por defecto
 * @return boolean devuelve true si el entero pasa la validación, o false si no la pasa
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    $res=false;

    if(($var>$min) && ($var<$max))
        $res=true;
    else
        $var=$defecto;

    return $res;
}

/**
 * Función que valida si un real pasado por referencia
 * está entre los valores mínimo y máximo indicados. Si no
 * lo está se le asignará un valor por defecto.
 *
 * @param float $var real que se quiere validar
 * @param float $min valor mínimo
 * @param float $max valor máximo
 * @param float $defecto valor por defecto
 * @return boolean devuelve true si el entero pasa la validación, o false si no la pasa
 */
function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    $res=false;

    if(($var>$min) && ($var<$max))
        $res=true;
    else
        $var=$defecto;

    return $res;
}

/**
 * Función que valida si una fecha está en formato dd/mm/aaaa.
 * Si no lo está devuelve el valor por defecto
 * 
 * @param string $var
 * @param string $defecto
 * @return bool|int
 */
function validaFecha(string &$var, string $defecto): bool 
{
    $res = true;
    $expr = "/\d{1,2}\/\d{1,2}\/\d{4}/";

    $res = preg_match($expr, $var);

    if(!$res)
    {
        $var = $defecto;
        $res = false;
    }

    if($res===true)
        $var = date("dd/mm/YYYY", $var);


    return $res;
}