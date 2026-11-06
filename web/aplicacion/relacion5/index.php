<?php

use function VALFILTER\validaEntero;

include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion5"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 5");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5", $barra);
cuerpo();
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
    
}

function cuerpo() {
?>
    <h2>Prueba funciones</h2>
    <nav class="barraMenu">
        <ul>
            <li><a href="pruebaFunciones.php">Prueba</a></li>
        </ul>
    </nav>
    <h2>Formulario</h2>
<?php

}

