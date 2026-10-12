<?php

use function PHPSTORM_META\type;

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
        "TEXTO"=>"act. 6"
    ]
];

//Definición del array vector
$vector=array(

    "primera" =>12.56, 
    24=>true, 
    67 =>23.76
);

// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 6");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 6 - MOSTRAR ARRAY USANDO FOREACH", $barra);
cuerpo($vector);
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo(array $vector) {
    ?>
        <!-- HTML -->
    <?php
    mostrarArrayIndiceValor($vector);
    echo "<hr>";
    mostrarArrayFunciones($vector);
}

//Funciones
function mostrarArrayIndiceValor(array $vector) {
    
    foreach($vector as $i => $valor) {
        echo "(key) {$i} => (value) {$valor} <br>".PHP_EOL;
    }
}

function mostrarArrayFunciones(array $vector) {
    $posicion = array_keys($vector);
    $valor = array_values($vector);

    for ($i=0; $i < count($posicion) ; $i++) { 
        echo "(key) {$posicion[$i]} => (value) {$valor[$i]} <br>".PHP_EOL;
    }

}