<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion2",
        "ENLACE"=>"/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO"=>"act. 3"
    ]
];

// Defino array con todos los caracteres posibles
$caracteres=["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", 
            "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];


//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 3 - GENERAR CADENA ALEATORIA", $barra);
cuerpo($caracteres);  //llamo a la vista
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
function cuerpo(array $caracteres)
{
?>
    <!-- HTML -->
<?php
    echo "<h1>Caracteres usando array</h1>";
    generarCadenaUsandoArray($caracteres);
    echo "<h1>Caracteres usando tabla ASCII</h1>";
    generarCadenaUsandoAscii();
}

// FUNCIONES************************
/**
 * Función que genera y muestra una cadena aleatoria usando todos los caracteres
 * posibles a partir de un array donde estén definidos.
 * @param array $array array con los caracteres permitidos
 * @return void
 */
function generarCadenaUsandoArray($array) {
    $cadena = "";
    $limite = count($array) - 1;

    for ($i=1; $i <= 20; $i++) { 
        $cadena .= $array[rand(0, $limite)];
    }

    echo $cadena;
}

/**
 * Función que genera y muestra una cadena aleatoria de 20
 * caracteres obtenidos aleatoriamente de la tabla ASCII
 * @return void
 */
function generarCadenaUsandoAscii() {
    $cadena = "";

    for ($i=1; $i <= 20; $i++) { 
        $caracter = "";

        do {

            $caracter = chr(rand(48,122)); // Con chr() obtengo el carácter a partir del código ASCII

        } while (!ctype_alnum($caracter)); // Con ctype_alnum() compruebo si el caracter es alfanumérico (es decir, si es únicamente letra o número)

        $cadena .= $caracter;
    }

    echo $cadena;
}