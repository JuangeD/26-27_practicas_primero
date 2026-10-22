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

// Para el ejercicio 7
$vector=array("uno","grande","caminos","a");

//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 3");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barra);
cuerpo($arrayCuentaVeces, $numLlamadas, $num1, $vector);
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
}

function cuerpo(array &$arrayCuentaVeces, int &$numLlamadas, int &$num1, array &$vector) {
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
    echo "<hr><h2>Ejercicio 2 - generarCadena()</h2>".PHP_EOL;
    echo "Cadena de -1 caracteres: ".generarCadena(-1)."<br>".PHP_EOL; // No muestra resultado puesto que salta error al ser un número negativo
    echo "Cadena de 20 caracteres: ".generarCadena(20)."<br>".PHP_EOL;
    echo "Cadena de 7 caracteres: ".generarCadena(7)."<br>".PHP_EOL;
    echo "Cadena de 10 caracteres (por defecto): ".generarCadena().PHP_EOL; // Valor por defecto

    /* ====== EJERCICIO 3 ====== */
    echo "<hr><h2>Ejercicio 3 - operaciones()</h2>".PHP_EOL;
    echo "Suma de operandos: ".operaciones(1, 5, 80, 2, 49, 34)."<br>".PHP_EOL;
    echo "Resta al primer operando el resto de operandos: ".operaciones(2, 5, 80, 2, 49, 34)."<br>".PHP_EOL;
    echo "Multiplicación de operandos: ".operaciones(3, 5, 80, 2, 49, 34)."<br>".PHP_EOL;
    echo "Resta de las posiciones pares menos las impares: ".operaciones(10, 5, 80, 2, 49, 34)."<br>".PHP_EOL;

    /* ====== EJERCICIO 4 ====== */
    echo "<hr><h2>Ejercicio 4 - devuelve()</h2>".PHP_EOL;
    echo "Con tres parámetros: multiplicación => ".devuelve($num1, 21, 31).", suma => {$num1}<br>".PHP_EOL;
    $num1=7; // En cada llamada reasigno el valor 7 a la variable $num1 pasada como parámetro al cuerpo ya que, al pasarla por referencia, modifica el valor de dicha variable.
    echo "Con primer parámetro: multiplicación => ".devuelve($num1).", suma => {$num1}<br>".PHP_EOL;
    $num1=7;
    echo "Con primer y segundo parámetro: multiplicación => ".devuelve($num1, 21).", suma => {$num1}<br>".PHP_EOL;
    $num1=7;
    echo "Con primer y tercer parámetro: multiplicación => ".devuelve(var1: $num1, num3: 31).", suma => {$num1}<br>".PHP_EOL;

    /* ====== EJERCICIO 5 ====== */
    echo "<hr><h2>Ejercicio 5 - hacerOperacion()</h2>".PHP_EOL;
    echo "Operación suma 3 + 1 => ".hacerOperacion("suma",3,1)."<br>".PHP_EOL;
    echo "Operación division 3 / 1 => ".hacerOperacion("division",3,1)."<br>".PHP_EOL; // Aquí debe retornar un valor 'false' ya que la operación 'division' no existe
    echo "Operación resta 3 - 1 => ".hacerOperacion("resta",3,1)."<br>".PHP_EOL;
    echo "Operación multiplicacion 3 x 1 => ".hacerOperacion("multiplicacion",3,1)."<br>".PHP_EOL;

    /* ====== EJERCICIO 6 ====== */
    echo "<hr><h2>Ejercicio 6 - llamadaAFuncion()</h2>".PHP_EOL;
    echo "23 + 43 => ".llamadaAFuncion(23,43,fn($a,$b)=>$a+$b)."<br>".PHP_EOL;
    echo "234 / 43 => ".llamadaAFuncion(234,43,fn($a,$b)=>$a/$b)."<br>".PHP_EOL;
    echo "5 x 5 => ".llamadaAFuncion(5,5,fn($a,$b)=>$a*$b)."<br>".PHP_EOL;

    /* ====== EJERCICIO 7 ====== */
    echo "<hr><h2>Ejercicio 7 - ordenar()</h2>".PHP_EOL;
    ordenar($vector);

    echo "Array ordenado => ";

    foreach($vector as $elem)
    {
        echo $elem." ";
    }
}

