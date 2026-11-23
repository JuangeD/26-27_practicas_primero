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
        "TEXTO"=>"carga pagina",
        "ENLACE"=>"/aplicacion/pruebas/cargapagina.php"
    ],
    [
        "TEXTO"=>"otrapagina"
    ]
];

$id=0;

if(isset($_REQUEST["id"]))
    {
        $id=intval($_REQUEST["id"]);
    }

$datos["id"]=$id;

$nombre="";

if(isset($_REQUEST["nombre"]))
    {
        $nombre=mb_trim($_REQUEST["nombre"]);
    }

$datos["nombre"]=$nombre;

//dibuja la plantilla de la vista
inicioCabecera("OTRA PAGINA");
cabecera();
finCabecera();
inicioCuerpo("OTRA PAGINA", $barra);
cuerpo($datos); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo(array $datos)
{
?>
    <br><br>
    <p>Esto es otra página</p>
<?php
    echo "se ha recibido un id {$datos["id"]} y nombre {$datos["nombre"]}";
}
