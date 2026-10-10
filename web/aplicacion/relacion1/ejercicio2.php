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
        "TEXTO"=>"act. 2"
    ]
];


// Definición de constantes y variables
const N = 1000;

$lanzamientos=realizarLanzamientos();
$resultados=realizarLanzamientos2();


// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2 - LANZAMIENTO DE DADO", $barra);
cuerpo($lanzamientos, $resultados);
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo(array $lanzamientos, array $resultados) {
    ?>
        <h1 style="text-align: center;">Lanzamiento de un dado</h1>
    <?php

    foreach ($lanzamientos as $i => $valor) {
        echo "lanzamiento ". $i+1 ." del dado: {$valor}<br>";
    }



    echo "<br>lanzado el dado ". N ." veces<br>";
    foreach ($resultados as $clave => $valor) {
        if($valor!=0)
            echo "el ". $clave+1 ." ha salido {$valor} con un porcentaje de ". calculaPorcentajeLado($valor) ."%<br>";
    }
}

function realizarLanzamientos() {
    $numeros= array_fill(0, 6, 0);

    for ($i=0; $i < 6; $i++) { 
        $numeros[$i]=rand(1,6);
    }

    return $numeros;
}

function realizarLanzamientos2() {
    $numeros= array_fill(0, 6, 0);

    $cont=0;
    while($cont<N) {
    
        $numeros[(rand()%6)]++;
        $cont++;
    }

    return $numeros;
}

function calculaPorcentajeLado(float $lado) {
    return ($lado/N)*100;
}