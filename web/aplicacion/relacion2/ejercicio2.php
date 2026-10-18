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
    echo "<h1>Mostrar cadena de diferentes maneras</h1>";
    mostrarCadena(); // Llamo a la función mostrarCadena()
    echo "<hr><h1>Mostrar en orden inverso</h1>";
    cadenaInversa(); // Llamo a la función cadenaInversa()
    echo "<hr><h1>Mostrar cadena separada por el carácter 'a'</h1>";
    separarCadena();
    echo "<hr><h1>Añadir \"/mujer \" después de la palabra \"niña\"</h1>";
    cambiarNina();
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

/**
 * Función que muestra la cadena "Está la niña en casa"
 * en orden inverso
 * @return void
 */
function cadenaInversa() {
    $cadena = "Está la niña en casa";

    $espacios=0;
    for($i=mb_strlen($cadena); $i>=0; $i--) {

        if(($i%2)==0)
            echo str_repeat("&nbsp;", $espacios).strtoupper(mb_substr($cadena, $i, 1))."<br>";
        else
            echo str_repeat("&nbsp;", $espacios).strtolower(mb_substr($cadena, $i, 1))."<br>";
        
        $espacios++;
    }
}

/**
 * Mostrar la cadena separada por el carácter 'a'
 * @return void
 */
function separarCadena() {
    $cadena = "Está la niña en casa";

    $cadenaPartida = explode("a", $cadena);

    for($i=0; $i < count($cadenaPartida); $i++) {
        echo $cadenaPartida[$i]."<br>";
    }
}

/**
 * Función que muestra el resultado
 * de buscar la palabra 'niña' en la frase
 * "Está la niña en casa" y sustituye el siguiente carácter
 * por '/mujer'
 * @return void
 */
function cambiarNina() {
    $cadena = "Está la niña en casa";

    $posicion = strpos($cadena, "niña"); // Obtengo la posición de la palabra 'niña' en la cadena
    $longitud = strlen("niña"); // Obtengo la longitud de la palabra buscada

    $cadenaCorregida = substr_replace($cadena, "/mujer ", ($posicion + $longitud), 1); // Reemplazo el carácter que se encuentra en la posición de 'niña' más su longitud por "/mujer "

    echo $cadenaCorregida; // Imprimo la cadena
}