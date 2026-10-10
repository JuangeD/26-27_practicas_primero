<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion1"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 1");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 1", $barra);
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
            <li><a href="ejercicio1.php">Act1.Librería Math</a></li>
            <li>-</li>
            <li><a href="ejercicio2.php">Act2.Lanzar dado</a></li>
            <li>-</li>
            <li><a href="ejercicio3.php">Act3.Arrays</a></li>
            <li>-</li>
            <li><a href="ejercicio4.php">Act4.TrianguloNum</a></li>
            <li>-</li>
            <li><a href="ejercicio5.php">Act5.ArrayVector</a></li>
            <li>-</li>
            <li><a href="ejercicio6.php">Act6.MostrarArrayConForeach</a></li>
        </ul>
    </nav>
<?php
}

