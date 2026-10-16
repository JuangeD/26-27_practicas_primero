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
        "TEXTO"=>"Expr. Regulares"
    ]
];

// Controlador

$cadena = 'tienes 25 años';

    // Buscar la palabra años
    $expr = '/años/';
    $resultado = [];

    preg_match($expr, $cadena, $resultado, PREG_OFFSET_CAPTURE); // Vuelca a un array el resultado
    // Con la flag 'PREG_OFFSET_CAPTURE' almacenamos la posición de la ocurrencia en la cadena

    // Buscar número
    $expr='/[0123456789]+/'; // Búsqueda de una o más ocurrencias de un número
    $expr='/[0-9]+/';
    $expr='/\d+/';
     $expr='/[[:digit:]]+/';

    // Busco un número con dos cifras
    $expr='/\d{2}/'; // Indica una ocurrencia númerica con dos dígitos

    // Buscar un número decimal
    $expr='/\d+\.\d+/'; // Al tener el '.' un significado especial se debe escapar con el carácter '\'

    // Buscar años y Años
    $expr='/años/i'; // Con el modificador 'i' es insensible a mayúsculas y minúsculas, es decir, no se distinguen

    // SUBPATRONES **************
    // quiero encontrar en un número real la parte decimal
    $expr='/\d+\.(\d)+/'; // Devuelve toda la ocurrencia y, además, devuelve un subpatrón con la parte decimal
    // El subpatrón se indica poniendo la parte que se quiere obtener como subpatron entre paréntesis


    $expr='/\/\*.*\*\//'; // Obtener comentarios tales que así /* Primer comentario */

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("EXPRESIONES REGULARES", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{

?>
    <!-- HTML -->
<?php
    

}


