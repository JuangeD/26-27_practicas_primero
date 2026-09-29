<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("PRUEBAS BASICAS");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>esto es html
    <?php
        echo "Esto es código php"; // Esto es un comentario

        $var1=25;
        $cadena='esto es una cadena';

        $var1+=12;
        echo $var1;

        $una_cadena="hola";
        $unaCadena="adios";

        $var1-=17;

        echo "$var1";

        $unaCadena=45;
        echo $unaCadena;

        if(isset($cadena2)) // Con isset() comprobamos si la variable está inicializada
            echo $cadena2;
    ?>
    
<?php
}