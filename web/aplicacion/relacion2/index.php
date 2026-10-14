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
            <li><a href="ejercicio1.php">Act1.EscrituraCadenas</a></li>
            <li>-</li>
            <li><a href="ejercicio2.php">Act2.MostrarCadenaSeparada</a></li>
        </ul>
    </nav>
<?php
}

