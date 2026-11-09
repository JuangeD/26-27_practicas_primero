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
    $real = 2.45;
    $fecha = "1/8/2021";
    $hora = "afdadf";
    $mail ="admin.fa-3543@gma.....i..l.com";
    $cadena = "Juange Díaz";
    $cadena2 = "34-23hola";
    $array = ["primero"=>23, 100=>"texto"];

    echo "<h1>VALNORMAL</h1>";

    echo "<h3>validaEntero()</h3>";
    echo "Variable \$entero antes de la función: $entero<br>";
    \VALNORMAL\validaEntero($entero, 1, 19, 5);
    echo "Variable \$entero después de la función: $entero";

    echo "<h3>validaReal()</h3>";
    echo "Variable \$real antes de la función: $real<br>";
    \VALNORMAL\validaReal($real, 1, 19, 5);
    echo "Variable \$real después de la función: $real";

    echo "<h3>validaFecha()</h3>";
    echo "Variable \$fecha antes de la función: $fecha<br>";
    \VALNORMAL\validaFecha($fecha, new DateTime()->format("d/m/Y"));
    echo "Variable \$fecha después de la función: $fecha";  

    echo "<h3>validaHora()</h3>";
    echo "Variable \$hora antes de la función: $hora<br>";
    \VALNORMAL\validaHora($hora, new DateTime()->format("H:i:s"));
    echo "Variable \$hora después de la función: $hora";

    echo "<h3>validaEmail()</h3>";
    echo "Variable \$mail antes de la función: $mail<br>";
    \VALNORMAL\validaEmail($mail, "defecto@mail.local");
    echo "Variable \$mail después de la función: $mail";

    echo "<h3>validaCadena()</h3>";
    echo "Variable \$cadena antes de la función: $cadena<br>";
    \VALNORMAL\validaCadena($cadena, 10, "Defecto");
    echo "Variable \$cadena después de la función: $cadena";

    echo "<h3>validaExpresion()</h3>";
    echo "Variable \$cadena2 antes de la función: $cadena2<br>";
    \VALNORMAL\validaExpresion($cadena2, "/\d+-[a-zA-Z]+/", "Defecto");
    echo "Variable \$cadena2 después de la función: $cadena2";

    echo "<h3>validaRango()</h3>";
    echo "Validar si existe el valor 23 y la clave \"primera\"<br>";
    if(\VALNORMAL\validaRango(23, $array))
        echo "Se ha encontrado la clave \"primero\"<br>";
    else
        echo "No se ha encontrado la clave \"primero\"<br>";

    if(\VALNORMAL\validaRango("primero", $array, 2))
        echo "Se ha encontrado el valor 23<br>";
    else
        echo "No se ha encontrado el valor 23<br>";

    /* Prueba de VALFILTER */
    // Variables para la prueba de las funciones
    $entero = 0;
    $real = 2.45;
    $fecha = "1/1/2001";
    $hora = "0:5:1";
    $mail = "juangfadfa34w35434 bvcne@gmai.l......com";
    $cadena = "juange diaz";
    $cadena2 = "34-hola";
    $array = ["primero"=>23, 100=>"texto"];

    echo "<h1>VALFILTER</h1>";
    
    echo "<h3>validaEntero()</h3>";
    echo "Variable \$entero antes de la función: $entero<br>";
    \VALFILTER\validaEntero($entero, 0, 19, 5);
    echo "Variable \$entero después de la función: $entero";

    echo "<h3>validaReal()</h3>";
    echo "Variable \$real antes de la función: $real<br>";
    \VALFILTER\validaReal($real, 1, 19, 5);
    echo "Variable \$real después de la función: $real";

    echo "<h3>validaFecha()</h3>";
    echo "Variable \$fecha antes de la función: $fecha<br>";
    \VALFILTER\validaFecha($fecha, new DateTime()->format("d/m/Y"));
    echo "Variable \$fecha después de la función: $fecha";

    echo "<h3>validaHora()</h3>";
    echo "Variable \$hora antes de la función: $hora<br>";
    \VALFILTER\validaHora($hora, new DateTime()->format("H:i:s"));
    echo "Variable \$hora después de la función: $hora";
    
    echo "<h3>validaEmail()</h3>";
    echo "Variable \$mail antes de la función: $mail<br>";
    \VALFILTER\validaEmail($mail, "defecto@mail.local");
    echo "Variable \$mail después de la función: $mail";

    echo "<h3>validaCadena()</h3>";
    echo "Variable \$cadena antes de la función: $cadena<br>";
    \VALFILTER\validaCadena($cadena, 10, "Defecto");
    echo "Variable \$cadena después de la función: $cadena";

    echo "<h3>validaExpresion()</h3>";
    echo "Variable \$cadena2 antes de la función: $cadena2<br>";
    \VALFILTER\validaExpresion($cadena2, "/\d+-[a-zA-Z]+/", "Defecto");
    echo "Variable \$cadena2 después de la función: $cadena2";

    echo "<h3>validaRango()</h3>";
    echo "Validar si existe el valor 23 y la clave \"primera\"<br>";
    if(\VALNORMAL\validaRango(23, $array))
        echo "Se ha encontrado la clave \"primero\"<br>";
    else
        echo "No se ha encontrado la clave \"primero\"<br>";

    if(\VALNORMAL\validaRango("primero", $array, 2))
        echo "Se ha encontrado el valor 23<br>";
    else
        echo "No se ha encontrado el valor 23<br>";
}

