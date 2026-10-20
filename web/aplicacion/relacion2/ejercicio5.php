<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion2",
        "ENLACE"=>"/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO"=>"act. 5"
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 5 - EXPRESIONES REGULARES ", $barra);
cuerpo();  //llamo a la vista
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
function cuerpo()
{
?>
    <!-- HTML -->
<?php
    localizarElementosUsandoExpresionesRegulares();
}

// ***** FUNCIONES *****
/**
 * Función que, a partir de un texto y expresiones regulares,
 * busca todas las coincidencias en el texto con las expresiones
 * regulares definidas
 * @return void
 */
function localizarElementosUsandoExpresionesRegulares() {

    // Creo la cadena de texto aleatorio
    $cadena = <<<fin
    <h1>
        Esto es un título
    </h1>
    <p> 
        Esto es un texto de prueba con número 213.45
    </p>
    correo: juange@mail.es
    más texto aleatorio
    php es un lenguaje que se combina junto con 
    <html>
    otro correo admin@localhost.local
    <table>
    
    </table>
    otro correo más 
    admi@antq.lc
    etiqueta personalizada de html <personalizada>
    23312 con más texto
    terminado el texto aleatorio 34545
    fin;

    $etiqueta = '/<\.+?>/'; // Expresión regular para buscar las etiquetas // Corrección
    $numero = '/[[:digit:]]+(\.\d+)?/'; // Expresión regular para buscar los números // Correción
    $correo = '/\s[[:alpha:]]@[[:alpha:]]+\.[[:alpha:]]{2,6}\s/'; // Expresión regular para buscar los correos

    $etiquetasEncontradas = [];
    $numerosEncontrados = [];
    $correosEncontrados = [];

    preg_match_all($etiqueta, $cadena, $etiquetasEncontradas, PREG_OFFSET_CAPTURE);
    preg_match_all($numero, $cadena, $numerosEncontrados, PREG_OFFSET_CAPTURE);
    preg_match_all($correo, $cadena, $correosEncontrados, PREG_OFFSET_CAPTURE);

    foreach ($etiquetasEncontradas[0] as $etiqueta) { 
        echo $etiqueta[1]."/".htmlspecialchars($etiqueta[0])."<br>".PHP_EOL;
    }

    for ($i=0; $i < count($numerosEncontrados); $i++) { 
        echo $numerosEncontrados[$i][1]."/".$numerosEncontrados[$i][0]."<br>".PHP_EOL;
    }

    for ($i=0; $i < count($correosEncontrados); $i++) { 
        echo $correosEncontrados[$i][1]."/".$correosEncontrados[$i][0]."<br>".PHP_EOL;
    }
}