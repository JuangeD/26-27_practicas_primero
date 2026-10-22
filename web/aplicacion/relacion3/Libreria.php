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

/**
 * Función que realiza una operación indicada sobre
 * una serie de argumentos pasados por parámetro. Recibe
 * al menos tres parámetros, el tipo de operación y dos operandos
 * 
 * Tiene tres operaciones definidas:
 *  1. suma todos los operandos
 *  2. al primer operando se restan el resto
 *  3. multiplicación de todos los operandos.  
 * 
 * En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
 * los de las posiciones impares (el primer operando es 1).
 *
 * @param integer $operacion tipo de operación a realizar
 * @param float $op1 primer operando
 * @param float $op2 segundo operando
 * @param float ...$operandos resto de operandos
 * @return float devuelve un float del resultado de la operación indicada
 */
function operaciones(int $operacion, float $op1, float $op2, float ...$operandos): float 
{

    $resultado = 0; // Inicializo resultado a 0

    switch($operacion)
    {
        case 1:
            $resultado=$op1+$op2; // Sumo los tres primeros operandos
            foreach($operandos as $num)
            {
                $resultado+=$num; // Voy sumando cada uno del resto de los operandos al valor de $resultado
            }
            break; // Salgo del switch
        case 2:
            $primero=$op1; // Almaceno el primer operando en una variable
            
            // Creo e inicializo una variable para el resto de operandos
            /* La inicializo con valor del operando 2 ya que es el primer
            parámetro que se le pasará al resto de operandos*/
            $restoNum=$op2;
            for($i=0;$i<count($operandos);$i++)
            {
                $restoNum+=$operandos[$i];
            }
            $resultado=$primero-$restoNum;
            break;
        case 3:
            $resultado=$op1*$op2; // Igualo resultado a la multiplicación de los tres primeros operandos

            foreach($operandos as $num)
            {
                $resultado*=$num;
            }
            break;
        default:
            $pares=0;
            $impares=0;

            for($i=1;$i<func_num_args();$i++) // Recorro los parámetros a partir del operando 1 para mirar si la posición es par o impar
            {
                if(($i%2)===0) // Si la posición es par se suma el argumento al valor de las posiciones pares
                    $pares+=func_get_arg($i);
                else
                    $impares+=func_get_arg($i); // En cambio si es impar se suma el argumento al valor de las posiciones impares
            }

            $resultado=$pares-$impares; // Por último se almacena en el resultado de la resta de las posiciones pares menos las impares
    }

    return $resultado; // Al salir del switch devuelvo resultado
}

/**
 * Esta función recibe como parámetros tres números (enteros) y devuelve la
 * suma de los tres valores en el primer parámetro y como resultado de la función el producto de los
 * tres valores. Los dos últimos parámetros tendrán definidos un valor por defecto,
 * siendo 5 y 10, respectivamente
 *
 * @param integer $var1 variable, donde se devolverá la suma de los tres parámetros
 * @param integer $num2 segundo número. El valor por defecto es 5
 * @param integer $num3 tercer número. El valor por defecto es 10
 * @return int devuelve el producto de los tres parámetros
 */
function devuelve(int &$var1, ?int $num2=5, ?int $num3=10): int
{
    

    $resultado = 1;
    foreach(func_get_args() as $arg) // Realización de la multiplicación de los argumentos
    {
        $resultado*=$arg;
    }

    $var1 += $num2 + $num3; // Suma que se devolverá en la variable $num1 pasada como referencia
    return $resultado;
}