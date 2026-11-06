<?php

namespace VALFILTER;

/*====== FUNCIONES ======*/
/**
 * Función que valida si un entero pasado por referencia
 * está entre los valores mínimo y máximo indicados. Si no
 * lo está se le asignará un valor por defecto.
 *
 * @param integer $var entero que se quiere validar
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    $res=true;

    $opciones = [
        "options"=>[
            "min_range"=>$min,
            "max_range"=>$max,
        ]
    ];
    

    if(filter_var($var, FILTER_VALIDATE_INT, $opciones)===false)
    {
        $var=$defecto;
        $res=false;
    }
        
    $var=filter_var($var, FILTER_SANITIZE_NUMBER_INT);

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
    $res=true;

    $opciones = [
        "options"=>[
            "min_range"=>$min,
            "max_range"=>$max,
        ]
    ];
    

    if(filter_var($var, FILTER_VALIDATE_FLOAT, $opciones)===false)
    {
        $var=$defecto;
        $res=false;
    }
        
    $var=filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT);

    return $res;
}