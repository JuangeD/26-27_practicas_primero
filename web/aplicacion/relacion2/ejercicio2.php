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
        "TEXTO"=>"act. 2"
    ]
];




//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2 - MOSTRAR CARACTERES SEPARADOS", $barra);
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
    <!-- HTML -->
<?php
    mostrarCadena();
}

// FUNCIONES************************
/**
 * 
 * Función que mustra la cadena "Está la niña en casa"
 * de distintas maneras
 * @return void
 */
function mostrarCadena() {
    $cadena = "Está la niña en casa"; // Almaceno la cadena en una variable

    // Mostrando la cadena con []
    for ($i=0; $i < strlen($cadena); $i++) { 
        echo str_repeat("&nbsp;",$i)."$cadena[$i]<br>";
    }

    // Mostrando la cadena con substr
    for($i=0; $i < strlen($cadena); $i++) {
        echo str_repeat("&nbsp;",$i).substr($cadena,$i, 1)."<br>";
    }

    // Mostrando la cadena con mb_substr
    for($i=0; $i < mb_strlen($cadena); $i++) {
        echo str_repeat("&nbsp;",$i).mb_substr($cadena, $i, 1)."<br>";
    }

}