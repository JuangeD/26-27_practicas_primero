<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include("Libreria.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion3"
    ]
];

//VARIABLES
$arrayCuentaVeces = [];
$numLlamadas = 0;


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 3");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barra);
cuerpo($arrayCuentaVeces, $numLlamadas);
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
}

function cuerpo(array &$arrayCuentaVeces, int &$numLlamadas) {
?>
    
<?php

    /* ====== EJERCICIO 1 ====== */
    echo "<h2>Ejercicio 1 - cuentaVeces()</h2>".PHP_EOL;
    cuentaVeces($arrayCuentaVeces, "php", 8, $numLlamadas);
    echo "Número de llamada: {$numLlamadas}<br>".PHP_EOL;
    cuentaVeces($arrayCuentaVeces, "javascript", 38, $numLlamadas);
    echo "Número de llamada: {$numLlamadas}<br>".PHP_EOL;
    cuentaVeces($arrayCuentaVeces, "alumnoJuange", 123, $numLlamadas);
    echo "Número de llamada: {$numLlamadas}<br>".PHP_EOL;
    cuentaVeces($arrayCuentaVeces, "primera", 1, $numLlamadas); // Saltará un error por el nombre de la posición
    echo "Número de llamada: {$numLlamadas}<br>".PHP_EOL;

    foreach ($arrayCuentaVeces as $pos => $val) {
        echo "Posición: {$pos}, valor: {$val}<br>".PHP_EOL;
    }

    /* ====== EJERCICIO 2 ====== */
    echo "<h2>Ejercicio 2 - generarCadena()</h2>";
    echo "Cadena de -1 caracteres: ".generarCadena(-1)."<br>".PHP_EOL; // No muestra resultado puesto que salta error al ser un número negativo
    echo "Cadena de 20 caracteres: ".generarCadena(20)."<br>".PHP_EOL;
    echo "Cadena de 7 caracteres: ".generarCadena(7)."<br>".PHP_EOL;
    echo "Cadena de 10 caracteres (por defecto): ".generarCadena().PHP_EOL; // Valor por defecto

}

