<?php

require_once("val_normal.php");
require_once("val_filter.php");

include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion5",
        "ENLACE"=>"/aplicacion/relacion5/index.php"
    ],
    [
        "TEXTO"=>"pruebaFunciones"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 5");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5", $barra);
cuerpo();
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
}

function cuerpo() {
?>
    
<?php

    /* Prueba de VALNORMAL */
    // Variables para la prueba de las funciones
    $entero = 34;
    $fecha = "4/3/2022";

    echo "<h1>VALNORMAL</h1>";

    echo "<h3>validaEntero()</h3>";
    echo "Variable \$entero antes de la función: $entero<br>";
    \VALNORMAL\validaEntero($entero, 1, 19, 5);
    echo "Variable \$entero después de la función: $entero";

    echo "<h3>validaFecha()</h3>";
    echo "Variable \$fecha antes de la función: $fecha<br>";
    \VALNORMAL\validaFecha($fecha, "06/11/2026");
    echo "Variable \$fecha después de la función: $fecha";  


    /* Prueba de VALFILTER */
    // Variables para la prueba de las funciones
    $entero = 0;

    echo "<h1>VALFILTER</h1>";

    echo "<h3>validaEntero()</h3>";
    echo "Variable \$entero antes de la función: $entero<br>";
    \VALFILTER\validaEntero($entero, 0, 19, 5);
    echo "Variable \$entero después de la función: $entero";
}

