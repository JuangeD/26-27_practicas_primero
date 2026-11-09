<?php

namespace VALNORMAL;

use DateTime;

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
 * @return bool
 */
function validaFecha(string &$var, string $defecto): bool 
{
    $expr = "/\d{1,2}\/\d{1,2}\/\d{4}/";

    $res = preg_match($expr, $var);

    if(!$res)
    {
        $var = $defecto;
        $res = false;
    }

    if($res===1)
    {
        $fecha = DateTime::createFromFormat("d/m/Y", $var);
        $var = $fecha->format("d/m/Y");
        $res = true;
    }

    return $res;
}

/**
 * Función que valida la hora pasado por parámetro. Si no es correcta
 * se le asigna un valor por defecto indicado
 * 
 * @param string $var hora a validar
 * @param string $defecto valor por defecto si falla
 * @return bool devuelve true si pasa la validación y false si no
 */
function validaHora(string &$var, string $defecto): bool
{
    $expr = "/\d{1,2}:\d{1,2}:\d{1,2}/";

    $res = preg_match($expr, $var);

    if(!$res)
    {
        $var = $defecto;
        $res = false;
    }

    if($res===1)
    {
        $hora = new DateTime($var);
        $var = $hora->format("H:i:s");
        $res = true;
    }

    return $res;
}

/**
 * Función que valida un email pasado. Si este no pasa la
 * validación se le asigna un valor por defecto
 * 
 * @param string $var
 * @param string $defecto
 * @return bool
 */
function validaEmail(string &$var, string $defecto): bool
{
    $expr = "/^[^\W\s@]+@[^\s@]+\.\w{2,3}$/";

    $res = preg_match($expr, $var);

    if(!$res)
    {
        $var = $defecto;
        $res = false;
    }

    if($res===1)
    {
        $res = true;
    }

    return $res;
}

/**
 * Función que valida que una cadena tenga una longitud máxima
 * indicada. Si no la tiene se le asigna un valor por defecto
 * 
 * @param string $var
 * @param int $longitud
 * @param string $defecto
 * @return bool
 */
function validaCadena(string &$var, int $longitud, string $defecto): bool
{
    $res = mb_strlen($var) <= $longitud;

    if(!$res)
        $var = $defecto;

    return $res;
}

/**
 * Función que valida una cadena según una expresión
 * pasada. Si no pasa la validación se le asigna un valor por defecto
 * 
 * @param string $var
 * @param string $expresion
 * @param string $defecto
 * @return bool
 */
function validaExpresion(string &$var, string $expresion, string $defecto): bool
{
    $res = preg_match($expresion, $var);

    if($res===1)
    {
        $res = true;
    }
    else
    {
        $var = $defecto;
        $res = false;
    }

    return $res;
}

/**
 * Función que valida si existe un valor en un array ($tipo=1) o
 * si una clave existe en el array ($tipo=2)
 * 
 * @param mixed $var valor o clave que se quiere buscar
 * @param array $posibles array en el que se quiere buscar
 * @param int $tipo búsqueda de valor(1) o de clave(2) 
 * @return bool
 */
function validaRango(mixed $var, array $posibles, int $tipo=1): bool
{
    $res=false;

    switch($tipo)
    {
        case 1:
            if(in_array($var, $posibles, true))
                $res = true;
        break;
        case 2:
            if(array_key_exists($var, $posibles))
                $res = true;
        break;
    }

    return $res;
}