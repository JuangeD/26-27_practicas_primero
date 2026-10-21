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

$r=[3,4,5,6,7,8,9,10];
$numero=suma1(1,2,...$r);

$numero=suma1(...$r);

//funciones anonimas
$func = function (float $a, float $b, float ...$resto): float 
{
    $res = 0;

    for($i=0; $i<func_num_args(); $i++) {
        $res+=func_get_arg($i);
    }

    return $res;
};

$numero = $func(1,2,3,4);

//funciones flecha
$s=function (int $a, int $b)
{
    return $a+$b;
};

$numero=$s(5,20);

$s=fn(int $a, int $b)=>$a+100; //las funciones de flecha están hechas para sentencias rápidas

$numero=$s(29,20);

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
