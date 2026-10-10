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
        "TEXTO"=>"act. 4"
    ]
];

//Constantes
const FILAS=9;

$array1=generarArraySinParametros();
$array2=generarArrayConParametros(FILAS);


// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 4 - TRIÁNGULO NUMÉRICO", $barra);
cuerpo($array1, $array2);
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo(array $array1, array $array2) {
    ?>
        <!-- HTML -->
    <?php

    // Mostrar por pantalla el primer array
    echo "<br>Primer array:<br>";
    mostrarArray($array1);
    echo "<br>Segundo array:<br>";
    mostrarArray($array2);
}

//Funciones
function generarArraySinParametros() {
    
    $array=array_fill(0,5,"");

    for ($i=1; $i <= 5; $i++) { 
        for($j=0; $j<$i; $j++) {
            $array[$i-1].= strval($i) . " ";
        }
    }

    return $array;
}

function generarArrayConParametros(int $num) {
    
    $array=array_fill(0,$num,"");

    for ($i=1; $i <= $num; $i++) { 
        for($j=0; $j<$i; $j++) {
            $array[$i-1].= strval($i) . " ";
        }
    }

    return $array;
}

function mostrarArray(array $array) {
    foreach ($array as $elem => $val) {
        if(!is_array($val))
            echo "{$val}<br>";
        else 
        {
            echo "elemento {$elem} de tipo Array con valores: <br>";
            foreach ($val as $i => $j) {
                echo "{$j}<br>";
            }
        }
    }
}