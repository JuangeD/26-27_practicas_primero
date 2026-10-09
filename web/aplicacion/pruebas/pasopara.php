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
        "TEXTO"=>"eje. pasopara"
    ]
];

//datos basicos
$nombre="Juange";
$edad=19;

$basicos=[
    "nombre"=>$nombre,
    "edad"=>$edad
];

//relleno otras
$otras=rellenarOtras();



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS", $barra);
cuerpo($basicos, $otras);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!--Esto va en el head-->
    <?php
}

//vista
function cuerpo(array $bas, string $ot)
{
?>
    <br><br>
<?php


    echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]} años ".PHP_EOL;
    echo "Con otros datos {$ot}";

}

// FUNCIONES
function rellenarOtras() {
    return "de 2 DAW";
}