<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    Elemento de pruebas
    <br><br>

    <nav class="barraMenu">
        <ul>
            <li><a href="basicas.php">Funcionamiento básico</a></li>
            <li>-</li>
            <li><a href="pasopara.php">Comunicación controlador-vista</a></li>
            <li>-</li>
            <li><a href="arrays.php">Arrays</a></li>
        </ul>
    </nav>
    
<?php
}
