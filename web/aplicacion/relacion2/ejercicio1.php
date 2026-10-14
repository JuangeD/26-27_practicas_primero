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
        "TEXTO"=>"act. 1"
    ]
];

// Definición de variables
$var1 = 5;
$var2 = true;

$heredoc = <<<fin
Esto es un texto con heredoc <br />
esto es una etiqueta &lt;html&gt; <br />
\$var1 = $var1<br />
fin;

$nowdoc = <<<'fin'
Esto es un texto con heredoc <br />
esto es una etiqueta &lt;html&gt; <br />
$var1 = $var1<br />
fin;

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("EJERCICIO 1 - ', \", HEREDOC y NOWDOC", $barra);
cuerpo($var1, $var2, $heredoc, $nowdoc);  //llamo a la vista
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
function cuerpo(int $var1, bool $var2, string $heredoc, string $nowdoc)
{
?>
    <!-- HTML -->
<?php
    echo "<h2>Cadena con '</h2>".PHP_EOL;
    echo 'Esto es una cadena, valor de $var1 = '. $var1 .', estos son comillas " \' á é ñ'.PHP_EOL;
    echo "<h2>Cadena con \"</h2>".PHP_EOL;
    echo "Esto es una &lt;span&gt; cadena &lt;/span&gt;, valor de \$var2 = {$var2}, estos son comillas \" ' á é ñ".PHP_EOL;
    echo "<h2>Cadena con HEREDOC</h2>".PHP_EOL;
    echo $heredoc.PHP_EOL;
    echo "<h2>Cadena con NOWDOC</h2>".PHP_EOL;
    echo $nowdoc.PHP_EOL;
}
