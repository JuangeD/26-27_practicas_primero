<?php

// LIBRERIA DE FUNCIONES QUE USARÉ EN LOS PROGRAMAS QUE DESARROLLE

/**
 * Funcion que devuelve una cadena con los errores formateados.
 * Los errores se pondrán dentre de una etiqueta del tipo indicado
 * a la que se colocará la clase
 *
 * @param array $errores  Array con todos los errores
 * @param string $etiqueta   Etiqueta a usar. Por defecto, div
 * @param string $clase   Clase a indicar dentro de la etiqueta. Por defecto clase error
 * @return string  Devuelve una cadena con los errores formateados.
 */
function mostrarErrores(
    array $errores,
    string $etiqueta = "div",
    string $clase = "error"
): string {
    $cadena = "";

    if ($errores) {  //si hay errores

        //etiqueta de apertura
        $cadena .= "<$etiqueta class=\"$clase\">";

        foreach ($errores  as $campo => $erroresCampo)
            foreach ($erroresCampo as $err) {
                //pone el error
                $cadena .= "$campo => $err <br>" . PHP_EOL;
            }

        //etiqueta de cierre
        $cadena .= "</$etiqueta >";
    }
    return $cadena;
}

/**
 * Función que devuelve una cadena con los errores correspondientes al campo indicado.
 * Se utiliza la etiqueta indicada para colocar el error. En esta etiqueta se
 * usa la clase indicada. 
 * Por último, se pondrá una sola etiqueta para todos los errores (unaSolaEtiqueta a true)
 * o una por error  
 *
 * @param string $campo  Campo para el que se mostrarán los errores
 * @param array $errores  Array con todos los errores de los campos
 * @param string $etiqueta  Etiqueta en la que se colocarán los errores  Por defecto, span
 * @param boolean $unaSolaEtiqueta Se definirá una sola etiqueta (O true) o una por error (false).
 *                                 Por defecto false
 * @param string $clase  Clase a usar en la etiqueta. Por defecto, error
 * @return string   Devuelve una cadena html con el código generado
 */
function mostrarErroresLinea(
    string $campo,
    array $errores,
    string $etiqueta = "span",
    bool $unaSolaEtiqueta = false,
    string $clase = "error"
): string {
    $cadena = "";

    if (isset($errores[$campo]) && $errores[$campo]) {  //si hay errores para el campo

        //si se pone una sola etiqueta
        if ($unaSolaEtiqueta)
            $cadena .= "<$etiqueta class=\"$clase\">";

        foreach ($errores[$campo]  as $err) {
            //si se pone una etiqueta por error
            if (!$unaSolaEtiqueta)
                $cadena .= "<$etiqueta class=\"$clase\">";

            //se pone el error
            $cadena .= $err;

            //si se pone una etiqueta por error
            if (!$unaSolaEtiqueta)
                $cadena .= "</$etiqueta >";
        }

        //si se tiene una sola etiqueta
        if ($unaSolaEtiqueta)
            $cadena .= "</$etiqueta >";
    }
    return $cadena;
}

/* ====== FUNCIONES DE FICHEROS ====== */
function escrituraFichero(string $nombre, ?array $datos = null): bool
{
    $rutaBase = RUTABASE . "/ficheros";

    if (!file_exists($rutaBase)) // Compruebo que existe la ruta
        mkdir($rutaBase); // Si no existe la creo

    $rutaBase .= "/$nombre"; // Añado a la ruta el nombre del fichero

    if (!isset($datos)) // Si no se pasan datos se devuelve false
        return false;

    $fiAbierto = fopen($rutaBase, "w"); // Abro el flujo de datos de escritura

    if (!$fiAbierto) // Compruebo que el fichero exista y se haya abierto el flujo de datos
        return false;

    /* Recorro y almaceno los datos */
    foreach ($datos as $fila) // Recorro las filas
    {
        $linea = "";
        foreach ($fila as $col) // Recorro las columnas (datos de cada subarray) de cada fila
        {
            if ($col == $fila[count($fila) - 1])
                $linea .= "$col";
            else
                $linea .= "$col;";
        }
        $linea .= "\r\n";

        fputs($fiAbierto, $linea); // Escribo en el fichero la linea generada
    }

    fclose($fiAbierto); // Cierro el fichero
    return true; // Devuelvo true para indicar que la operación se ha realizado correctamente
}

function lecturaFichero(string $nombre, ?array &$datos = null): bool
{
    $rutaBase = RUTABASE . "/ficheros";

    if (!file_exists($rutaBase))
        mkdir($rutaBase);

    $rutaBase .= "/$nombre";

    if (!isset($datos))
        return false;

    if(!file_exists($rutaBase))
        return false;


    $fiAbierto = fopen($rutaBase, "r");

    /* Borro el contenido del array */
    foreach ($datos as $pos => $val) {
        unset($datos[$pos]);
    }

    /* Leo el fichero y almaceno los datos */
    while ($linea = fgets($fiAbierto)) // Voy obteniendo una a una las líneas del fichero
    {
        $linea = str_replace("\r", "", $linea); // Sustituyo la \r por "" para eliminarla
        $linea = str_replace("\n", "", $linea); // Sustituyo la \n por "" para eliminarla

        if ($linea != "") // Compruebo que $linea tenga contenido
        {
            $linea = explode(";", $linea); // Si lo tiene obtengo un array a partir del separador ';'
            $datos[] = $linea; // En la siguiente posición de $datos inserto un array con las propiedades de los puntos
        }
    }

    fclose($fiAbierto); // Cierro el fichero
    return true;
}

function obtenerIpNavegador(): string
{
    /* Obtengo la dirección IP y navegador que usa el usuario al ejecutar la aplicación */
    $dirIp = str_replace(".", "_", $_SERVER['REMOTE_ADDR']); // Dirección ip desde la que se ha realizado la petición
    $navegador = "otro";
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    /* Según la cadena que se encuentre en el HTTP_USER_AGENT se asignará un navegador u otro */
    if (mb_stripos($userAgent, 'Edg'))
        $navegador = "edge";

    if (mb_stripos($userAgent, 'Opr') || mb_stripos($userAgent, 'OPR'))
        $navegador = "opera";

    if (mb_stripos($userAgent, 'Chrome'))
        $navegador = "chrome";

    if (mb_stripos($userAgent, 'Firefox'))
        $navegador = "firefox";

    if (mb_stripos($userAgent, 'Safari'))
        $navegador = "safari";


    return $dirIp."_".$navegador;
}
