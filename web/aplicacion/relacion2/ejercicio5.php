<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "relacion2",
        "ENLACE" => "/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO" => "act. 5"
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
function localizarElementosUsandoExpresionesRegulares()
{

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

    $etiqueta = "/<.+?>/"; // Expresión regular para buscar las etiquetas // Corrección
    $numero = "/\d+(\.\d+)?/"; // Expresión regular para buscar los números // Correción
    $correo = "/[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}/"; // Expresión regular para buscar los correos

    $etiquetas = [];
    $numeros = [];
    $emails = [];

    preg_match_all($etiqueta, $cadena, $etiquetas, PREG_OFFSET_CAPTURE);
    preg_match_all($numero, $cadena, $numeros, PREG_OFFSET_CAPTURE);
    preg_match_all($correo, $cadena, $emails, PREG_OFFSET_CAPTURE);
?>

    <h2>Texto original:</h2>
    <pre><?= htmlspecialchars($cadena) ?></pre>

    <h2>Etiquetas encontradas:</h2>
    <ul>
        <?php
        foreach ($etiquetas[0] as $etiqueta) {
            echo "<li>Posición {$etiqueta[1]}:" . htmlspecialchars($etiqueta[0]) . "</li>" . PHP_EOL;
        } ?>
    </ul>

    <h2>Números encontrados:</h2>
    <ul>
        <?php
        foreach ($numeros[0] as $numero) {
            echo "<li>Posición $numero[1] : $numero[0] </li>" . PHP_EOL;
        } ?>
    </ul>

    <h2>Emails encontrados:</h2>
    <ul>
        <?php
        foreach ($emails[0] as $email) {
            echo "<li>Posición $email[1] : $email[0]</li> " . PHP_EOL;
        }
        ?>
    </ul>
<?php
}
