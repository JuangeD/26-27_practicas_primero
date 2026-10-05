<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR

//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 1");
cabecera();
finCabecera();
inicioCuerpo("Relación 1");
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
            <li><a href="ejercicio1.php">Act1 - Librería Math</a></li>
            <li>-</li>
            <li><a href="ejercicio2.php">Act2 - Lanzar dado</a></li>
        </ul>
    </nav>
<?php
}

