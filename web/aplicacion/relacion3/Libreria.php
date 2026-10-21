<?php
// ***** FUNCIONES *****

/**
 * Función que rellena una posición de un array
 * asociativo con un número. Devolverá un error
 * si la posición indicada es "2daw" o "primera"
 *
 * @param array $array array referencidado que se quiere rellenar
 * @param string $posicion posición del array
 * @param integer $num1 número que se quiere insertar
 * @param integer $num2 número referenciado que almacena el número de la llamada
 * @return boolean devuelve true si todo funciona correctamente
 */
function cuentaVeces(array &$array, string $posicion, int $num1, int &$num2): bool
{

    static $llamada=0; // Creo una variable estática para el número de llamada

    if(($posicion==="2daw")||($posicion==="primera")) // Si la posicion es '2daw' o 'primera' salta error
        return false; // Devuelvo false para lanzar el error

    $array[$posicion]=$num1; // Agrego el primer número a la posición asociativa

    $llamada++; // Incremento en 1 la llamada para obtener el número de llamada
    $num2 = $llamada; // Devuelvo en la variable referenciada el número de la llamada

    return true; // Devuelvo true al final para indicar que todo se ha ejecutado correctamente
}


function generarCadena(int $longitud=10): bool|string {
    /* Variables */
    $cadena = "";
    $char = '';

    if($longitud<0)
        return false;


    for($i=0; $i<$longitud; $i++)
    {
        do 
        {
            $char = chr(rand(48,122));

        } while(!ctype_alnum($char));

        $cadena.=$char;
    }

    return $cadena;
    
}