<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX");
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
    <br><br>

    <p>Esta es una web contiene todos los ejemplos copiados en clase
        y todas las relaciones de ejercicios.
    </p>
<?php
}

// Comentario en la rama dev
// Otro comentario en la rama dev