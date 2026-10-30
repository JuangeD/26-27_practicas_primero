<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"pruebas"
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("ACCESO PRUEBAS", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <h2>EJEMPLOS DE CLASE</h2>

    <nav class="barraMenu">
        <ul>
            <li><a href="basicas.php">Funcionamiento básico</a></li>
            <li>-</li>
            <li><a href="pasopara.php">Comunicación controlador-vista</a></li>
            <li>-</li>
            <li><a href="arrays.php">Arrays</a></li>
            <li>-</li>
            <li><a href="cadenas.php">Cadenas</a></li>
            <li>-</li>
            <li><a href="expresionesRegulares.php">Expr. Regulares</a></li>
            <li>-</li>
            <li><a href="index_funciones.php">Funciones</a></li>
            <li>-</li>
            <li><a href="clases.php">Clases</a></li>
            <li>-</li>
            <li><a href="pagFormulario.php">Pag. formulario</a></li>
        </ul>
    </nav>
    
<?php
}
