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
// Para el ejercicio 1
$arrayCuentaVeces = [];
$numLlamadas = 0;

// Para el ejercicio 4
$num1 = 7;


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 3");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barra);
cuerpo($arrayCuentaVeces, $numLlamadas, $num1);
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
}

function cuerpo(array &$arrayCuentaVeces, int &$numLlamadas, int &$num1) {
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
    echo "<h2>Ejercicio 2 - generarCadena()</h2>".PHP_EOL;
    echo "Cadena de -1 caracteres: ".generarCadena(-1)."<br>".PHP_EOL; // No muestra resultado puesto que salta error al ser un número negativo
    echo "Cadena de 20 caracteres: ".generarCadena(20)."<br>".PHP_EOL;
    echo "Cadena de 7 caracteres: ".generarCadena(7)."<br>".PHP_EOL;
    echo "Cadena de 10 caracteres (por defecto): ".generarCadena().PHP_EOL; // Valor por defecto

    /* ====== EJERCICIO 3 ====== */
    echo "<h2>Ejercicio 3 - operaciones()</h2>".PHP_EOL;
    echo "Suma de operandos: ".operaciones(1, 5, 80, 2, 49, 34)."<br>".PHP_EOL;
    echo "Resta al primer operando el resto de operandos: ".operaciones(2, 5, 80, 2, 49, 34)."<br>".PHP_EOL;
    echo "Multiplicación de operandos: ".operaciones(3, 5, 80, 2, 49, 34)."<br>".PHP_EOL;
    echo "Resta de las posiciones pares menos las impares: ".operaciones(10, 5, 80, 2, 49, 34)."<br>".PHP_EOL;

    /* ====== EJERCICIO 4 ====== */
    echo "<h2>Ejercicio 4 - devuelve()</h2>".PHP_EOL;
    echo "Con tres parámetros: multiplicación => ".devuelve($num1, 21, 31).", suma => {$num1}<br>".PHP_EOL;
    echo "Con primer parámetro: multiplicación => ".devuelve($num1).", suma => {$num1}<br>".PHP_EOL;
    echo "Con primer y segundo parámetro: multiplicación => ".devuelve($num1, 21).", suma => {$num1}<br>".PHP_EOL;
    echo "Con primer y tercer parámetro: multiplicación => ".devuelve(var1: $num1, num3: 31).", suma => {$num1}<br>".PHP_EOL;
}

