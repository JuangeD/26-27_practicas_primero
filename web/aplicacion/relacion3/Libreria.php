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

/**
 * Función que genera un cadena según una
 * longitud indicada. Si no se le indica, el
 * valor por defecto es 10
 *
 * @param integer $longitud número de caracteres de la cadena
 * @return boolean|string devuelve false si el número de caracteres es negativo. Si no hay errores devuelve la cadena
 */
function generarCadena(int $longitud=10): bool|string 
{
    $cadena = ""; // Variable donde se almacenará la cadena
    $char = ''; // Variable donde se almacenará un carácter generado

    if($longitud<0) // Comprobar si la longitud es negativa
        return false; // Salta error


    for($i=0; $i<$longitud; $i++) // Bucle for para generar la cadena según la longitud indicada
    {
        do 
        {
            $char = chr(rand(48,122)); // Generar un carácter aleatorio de la tabla ASCII

        } while(!ctype_alnum($char)); // Generar dicho carácter mientras que no sea un alfanumérico

        $cadena.=$char; // Una vez sea un alfanumérico, se concatena a la variable de la cadena
    }

    return $cadena; // Devuelvo la cadena
    
}

function operaciones(int $operacion, float ...$operandos): float 
{

    $resultado = 0;

    switch($operacion)
    {
        case 1:
            foreach($operandos as $num)
            {
                $resultado+=$num; // Voy sumando cada uno de los operandos al valor de $resultado
            }
            break; // Salgo del switch
        case 2:
            $primero=$operandos[0]; // Almaceno el primer operando en una variable
            $restoNum=0; // Creo e inicializo una variable para el resto de operandos
            for($i=1;$i<count($operandos);$i++)
            {
                $restoNum+=$operandos[$i];
            }
            $resultado=$primero-$restoNum;
            break;
        case 3:
            $resultado=1; // Inicializo a 1 el resultado para poder realizar la multiplicación
            foreach($operandos as $num)
            {
                $resultado*=$num;
            }
            break;
        default:
            $pares=0;
            $impares=0;

            foreach($operandos as $ind => $val) 
            {
                if(($ind%2)===0)
                    $pares+=$val;
                else
                    $impares+=$val;
            }

            $resultado=$pares-$impares;
    }

    return $resultado;
}