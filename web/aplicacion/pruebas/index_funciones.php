<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include("mis_funciones.php");

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
        "TEXTO"=>"eje. funciones"
    ]
];

$numero=doble(3);
// comprobacion
if($numero===false) 
    {
        //hay un error. lo resuelvo
        $numero=10;
    }

if(($numero=doble($numero))===false)
    {
        exit;
    }


//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES");
cabecera();
finCabecera();
inicioCuerpo("EJEMPLOS FUNCIONES", $barra);
cuerpo($numero); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo(int $n)
{
?>

<?php
    echo "el doble del número es {$n}".PHP_EOL;
    echo "el número {$n} es el doble de otro".PHP_EOL;
}
