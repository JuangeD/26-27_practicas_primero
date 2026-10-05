<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
const numLanzamientos = 6;

$resultadoLanzamientos=[];



// Dibujo la plantilla de la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 2 - LANZAMIENTO DE DADO");
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
        <h1 style="text-align: center;">Lanzamiento de un dado</h1>
    <?php
}

function realizarLanzamientos($numLanzamientos) {
    $numeros=[];

    for ($i=0; $i < $numLanzamientos; $i++) { 
        
    }
}