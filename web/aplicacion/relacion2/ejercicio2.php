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
function mostrarCadena() {
    $cadena = "Está la niña en casa";

    for ($i=0; $i < ; $i++) { 
        # code...
    }
}