<?php
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
    
<?php

}

