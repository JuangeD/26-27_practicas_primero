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
$puntosDefecto = [
        new Punto(100, 200, "blue", 3),
        new Punto(300, 150, "green", 1),
        new Punto(50,  400, "red", 2)
    ];

$puntos = [];
$datosPuntos = [];

if(lecturaFichero("imagen_".obtenerIpNavegador().".dat", $datosPuntos))
{
    foreach($datosPuntos as $dato)
    {
        array_push($puntos, new Punto(intval($dato[0]), intval($dato[1]), $dato[2], intval($dato[3])));
    }
}
else
    $puntos = $puntosDefecto;