<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"pruebas",
        "ENLACE"=>"/aplicacion/pruebas/index.php"
    ],
    [
        "TEXTO"=>"eje. cargapagina"
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("CARGA PAGINA");
cabecera();
finCabecera();
inicioCuerpo("CARGA PAGINA", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
    $id=15;
?>
    <br><br>
    <h2>primera forma: enlace</h2>
    <a href="<?= "otrapagina.php?id=$id&nombre=juange" ?> "> Enlace a otra pagina</a>
    <form method="post" action="otrapagina.php">
        <input type="hidden" name="id" value="<?= $id+5 ?>">

        <select name="id">
            <option value="1">Primero</option>
            <option value="2">Segundo</option>
            <option value="3">Tercero</option>
        </select>

        <label>Nombre:</label>
        <input type="text" name="nombre">
        <br><br>
        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="borrado" value="E1">
        <input type="submit" name="insertar" value="E3">
    </form>
<?php
   
}
