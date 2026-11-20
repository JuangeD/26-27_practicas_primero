<?php 

date_default_timezone_set('Europe/Madrid'); // Configurar la zona horaria

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO=="produccion")
    error_reporting(0);
    else 
        error_reporting(E_ALL);  

spl_autoload_register(function ($clase){
    $ruta=RUTABASE."/scripts/clases/";
    $fichero=$ruta."$clase.php";
    
    if (file_exists($fichero))
        {
            require_once($fichero);
        }
      else
        {
            throw new Exception("La clase $clase no se ha encontrado.");
        }
});

include(RUTABASE."/aplicacion/plantilla/plantilla.php");
include(RUTABASE."/scripts/librerias/validacion.php");
include(RUTABASE."/scripts/librerias/funcionesVarias.php");

//creo todos los objetos que necesita mi aplicación
$puntos = null;
$datos = [];

if(lecturaFichero("imagen_".obtenerIpNavegador(), $datos))
{
    foreach([array_values($datos)] as $valor)
    {

    }
}
else {
    $puntos = [
        new Punto(100, 200, "blue", 3),
        new Punto(300, 150, "green", 1),
        new Punto(50,  400, "red", 2)
    ];
}