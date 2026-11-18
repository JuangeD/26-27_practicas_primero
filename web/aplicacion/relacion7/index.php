<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion7"
    ]
];


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 7");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barra);
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
    <form action="post">
        <!-- Coordenadas -->
        <h3>Coordenadas</h3>
        <input type="text" name="cordX" autofocus>
        <label>X</label>
        <input type="text" name="cordY">
        <label>Y</label>

        <!-- Color -->
        <h3>Color</h3>


        <!-- Grosor -->
        <h3>Grosor</h3>
        <label>Fino</label>
        <input type="radio" name="grosor" value="fino">
        <label>Medio</label>
        <input type="radio" name="grosor" value="medio" checked>
        <label>Gordo</label>
        <input type="radio" name="grosor" value="gordo">
    </form>
<?php
}