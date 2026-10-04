<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//variables
$num1=23.59;
$num2=19.12;



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1 - Librería Math");
cuerpo($num1,$num2);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!--Esto va en el head-->
    <?php
}

//vista
function cuerpo($num1, $num2)
{
?>
    <br><br>
<?php

    /* Prueba de las funciones de la librería Math con las variables pasadas a la función */
    echo "num1={$num1} y num2={$num2} <br><br>".PHP_EOL;
    echo "Round: num1=". round($num1)." num2=". round($num2). "<br>".PHP_EOL; // Prueba de round()
    echo "Floor: num1=". floor($num1)," num2=". floor($num2). "<br>".PHP_EOL; // Prueba de floor()
    echo "Pow(^2): num1=". pow($num1,2)." num2=". pow($num2,2). "<br>".PHP_EOL; // Prueba de pow()
    echo "Sqrt: num1=". sqrt($num1)." num2=". sqrt($num2). "<br><hr>".PHP_EOL; // Prueba de sqrt()

    /* Redondeo de números para poder usarlos con la función dechex() */
    $num1=round($num1);
    $num2=round($num2);

    echo "num1={$num1} y num2={$num2} <br><br>".PHP_EOL;
    echo "dechex: num1=". dechex($num1)." num2=". dechex($num2). "<br>".PHP_EOL; // Prueba de dechex
    echo "base_convert: 321=". base_convert("321",4,8)." | 21=". base_convert("21",4,8). "<br>"; // Prueba de convertir de base 4 a base 8 con base_convert()
}
