<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
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
        "TEXTO"=>"act. 5"
    ]
];

//Definición del array vector
$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;

// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 4 - TRIÁNGULO NUMÉRICO", $barra);
cuerpo();
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo() {
    ?>
        <!-- HTML -->
    <?php

}
//Funciones
