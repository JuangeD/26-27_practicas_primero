<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion1",
        "ENLACE"=>"/aplicacion/relacion1/index.php"
    ],
    [
        "TEXTO"=>"act. 1"
    ]
];




//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1 - Librería Math", $barra);
cuerpo();  //llamo a la vista
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
function cuerpo()
{
?>
    <br><br>
<?php

    $num1=23.59;
    $num2=19.12;

    /* Prueba de las funciones de la librería Math con las variables pasadas a la función */
    echo "VARIABLES PRUEBA LIBRERÍA MATH<br>".PHP_EOL;
    echo "num1={$num1} y num2={$num2} <br><br>".PHP_EOL;
    echo "Round: num1=". round($num1)." num2=". round($num2). "<br>".PHP_EOL; // Prueba de round()
    echo "Floor: num1=". floor($num1)," num2=". floor($num2). "<br>".PHP_EOL; // Prueba de floor()
    echo "Pow(^2): num1=". pow($num1,2)." num2=". pow($num2,2). "<br>".PHP_EOL; // Prueba de pow()
    echo "Sqrt: num1=". sqrt($num1)." num2=". sqrt($num2). "<br>".PHP_EOL; // Prueba de sqrt()
    echo "Abs: num1=". abs($num1)." num2=". abs($num2)."<br><br>".PHP_EOL;

    /* Redondeo de números para poder usarlos con la función dechex() */
    $num1=round($num1);
    $num2=round($num2);

    echo "REDONDEO DE VARIABLES PARA PROBAR DECHEX Y BASE_CONVERT<br>".PHP_EOL;
    echo "num1={$num1} y num2={$num2} <br>".PHP_EOL;
    echo "dechex: num1=". dechex($num1)." num2=". dechex($num2). "<br>".PHP_EOL; // Prueba de dechex
    echo "base_convert: 321=". base_convert("321",4,8)." | 21=". base_convert("21",4,8). "<br><br>"; // Prueba de convertir de base 4 a base 8 con base_convert()

    // PRUEBAS CON NÚMEROS EN BINARIO, OCTAL Y HEXADECIMAL
    $numBinario=0b1010;
    $numOctal=0o2361;
    $numHexa=0x12A;

    echo "VALORES INCIALES DE LAS VARIABLES<br>".PHP_EOL;
    echo "numBinario=". decbin($numBinario) ." numOctal=". decoct($numOctal) ." numHexa=". dechex($numHexa) ."<br><br>".PHP_EOL;
    echo "VALORES DE LAS VARIABLES EN DECIMAL<br>".PHP_EOL;
    echo "numBinario=". bindec(strval($numBinario))." numOctal=". octdec(strval($numOctal)). " numHexa=". hexdec(strval($numHexa));
}
