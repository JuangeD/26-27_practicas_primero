<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion2"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 2");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 2", $barra);
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
    <h2>Ejercicios</h2>
    <nav class="barraMenu">
        <ul>
            <li><a href="ejercicio1.php">Act1.HEREDOCyNOWDOC</a></li>
        </ul>
    </nav>
<?php
}

