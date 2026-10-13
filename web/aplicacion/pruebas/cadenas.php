<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Definición de constantes
define("NUME", 25);
const NUME1=56;

//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"pruebas",
        "ENLACE"=>"/aplicacion/pruebas/index.php"
    ],
    [
        "TEXTO"=>"eje. cadenas"
    ]
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("PRUEBAS BASICAS", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>

El niñ&ntilde;o me ha escrito una carta. 
Qué&eacute; &lt;&gt; bonita

<?php
}