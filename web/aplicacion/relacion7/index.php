<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion7"
    ]
];

$punto = null;
$datos = [
    "cordX"=>0,
    "cordY"=>0,
    "color"=>"black",
    "grosor"=>2
];
$errores = [];

if(isset($_POST["guardar"]))
{
    $cordX = intval($_POST["cordX"]);
    $cordY = intval($_POST["cordY"]);
    $color = $_POST["color"];
    $grosor = intval($_POST["grosor"]);

    if(!validaEntero($cordX, 0, 500, $cordX))
        $errores["cordX"][] = "La coordenada X debe estar entre 0 y 500";

    if(!validaEntero($cordY, 0, 500, $cordY))
        $errores["cordY"][] = "La coordenada Y debe estar entre 0 y 500";

    if($color === "" && !key_exists($color, Punto::COLORES))
        $errores["color"][] = "El color no está entre los indicados";

    if(!key_exists($grosor, Punto::GROSORES))
        $errores["grosor"][] = "El grosor no está entre los indicados";

    if(empty($errores))
        $punto = new Punto($cordX, $cordY, $color, $grosor);
}


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 7");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barra);
cuerpo($datos, $errores);
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
    
}

function cuerpo(array $datos, array $errores) {
?>
    <form action="#" method="post">
        <!-- Coordenadas -->
        <h3>Coordenadas</h3>
        <label>X:</label>
        <input type="text" name="cordX" value="<?php echo $datos["cordX"] ?>" autofocus>
        <?php echo mostrarErroresLinea("cordX", $errores, "span", true) ?>
        <br>
        <br>

        <label>Y:</label>
        <input type="text" name="cordY" value="<?php echo $datos["cordY"] ?>">
        <?php echo mostrarErroresLinea("cordY", $errores, "span", true) ?>
        <!-- Color -->
        <h3>Color</h3>
        <?php echo mostrarErroresLinea("color", $errores, "span", true) ?>
        <select name="color" class="for_select">
            <?php 
                foreach(Punto::COLORES as $clave => $valor)
                {
                    echo "<option value='".$clave."' ". (($clave===$datos["color"])?"selected":"") ." >". mb_strtoupper($valor["nombre"]) ."</option>".PHP_EOL;
                }
            ?>
        </select>

        <!-- Grosor -->
        <h3>Grosor</h3>
        <?php
            echo mostrarErroresLinea("grosor", $errores, "span", true);
            foreach(Punto::GROSORES as $clave => $valor)
            {
                echo "<label>". mb_strtoupper($valor) ."</label>".PHP_EOL;
                echo "<input type='radio' name='grosor' value='$clave' ". (($clave === 2)?"checked":"") .">".PHP_EOL;
            }
        
        ?>
        <br>
        <br>

        <input type="submit" name="guardar" value="Guardar" class="boton">
    </form>
<?php
}