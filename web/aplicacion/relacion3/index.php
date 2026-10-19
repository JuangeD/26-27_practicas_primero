<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include("Libreria.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion3"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 3");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barra);
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
    
<?php

}

