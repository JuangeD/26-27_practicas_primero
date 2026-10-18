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
        "TEXTO"=>"act. 4"
    ]
];

// Definición de variables
$var1 = 17.5;
$var2 = 379987.24;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 4 - MOSTRAR CARACTERES ", $barra);
cuerpo($var1, $var2);  //llamo a la vista
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
function cuerpo(float $var1, float $var2)
{
?>
    <!-- HTML -->
<?php
    $str1 = strval($var1);
    $str1Rellena = str_pad($str1, 15, "0", STR_PAD_LEFT); // Relleno con 0 a la izquierda hasta completar el string con 15 caracteres

    $str2 = strval($var2);
    $str2Rellena = str_pad($str2, 15, " ", STR_PAD_LEFT); // Relleno con " " a la izquierda hasta completar el string con 15 caracteres
    // Lo único es que el HTML machaca los espacios anteriormente añadidos y solo muestra 1 en vez de los 11 añadidos

    echo "el primer valor -{$str1Rellena}-, el segundo valor -{$str2Rellena}-";
}
