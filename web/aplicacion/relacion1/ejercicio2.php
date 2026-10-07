<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
const NUMLANZAMIENTOS = 6;

$resultadoLanzamientos=[];



// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2 - LANZAMIENTO DE DADO");
cuerpo($resultadoLanzamientos);
finCuerpo();

//*********************************************************

// Vista
function cabecera() {
    ?>
    <!-- HEAD -->
    <?php
}

function cuerpo($resultados) {
    ?>
        <h1 style="text-align: center;">Lanzamiento de un dado</h1>
    <?php

    $resultados=realizarLanzamientos(NUMLANZAMIENTOS);

    foreach ($resultados as $clave => $valor) {
        if($valor!=0)
            echo "el ". $clave+1 ." ha salido {$valor} con un porcentaje de ". calculaPorcentajeLado($valor) ."%<br>";
    }
}

function realizarLanzamientos($numLanzamientos) {
    $numeros= array_fill(0, NUMLANZAMIENTOS, 0);
    $ladoDado=0;

    for ($i=0; $i < $numLanzamientos; $i++) { 
        $ladoDado=rand(1,6);
        $numeros[$ladoDado-1]++;

        echo "lanzamiento ". $i+1 ." del dado: {$ladoDado}<br>";
    }

    return $numeros;
}

function calculaPorcentajeLado($lado) {
    return ($lado/NUMLANZAMIENTOS)*100;
}