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

/* Obtengo la dirección IP y navegador que usa el usuario al ejecutar la aplicación */
$dirIp = str_replace(".", "_", $_SERVER['REMOTE_ADDR']); // Dirección ip desde la que se ha realizado la petición
$navegador = "otro";
$userAgent = $_SERVER['HTTP_USER_AGENT'];

/* Según la cadena que se encuentre en el HTTP_USER_AGENT se asignará un navegador u otro */
if(mb_stripos($userAgent, 'Edg'))
    $navegador = "edge";

if(mb_stripos($userAgent, 'Opr') || mb_stripos($userAgent, 'OPR'))
    $navegador = "opera";

if(mb_stripos($userAgent, 'Chrome'))
    $navegador = "chrome";

if(mb_stripos($userAgent, 'Firefox'))
    $navegador = "firefox";

if(mb_stripos($userAgent, 'Safari'))
    $navegador = "safari";

$nombreArchivo = "imagen_". $dirIp ."_$navegador"; // Nombre del archivo

/* Datos del formulario */
$datos = [
    "cordX"=>0,
    "cordY"=>0,
    "color"=>"black",
    "grosor"=>2
];
$errores = []; // Errores

// Creación de la imagen
$imagen = imagecreatetruecolor(501,501);

/* Pinto el fondo blanco de la imagen */
$blanco = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $blanco);

/* Pinto el marco negro de la imagen */
$negro = imagecolorallocate($imagen, 0, 0, 0);
imagerectangle($imagen, 0, 0, 500, 500, $negro);

if(isset($_POST["guardar"]))
{
    $datos["cordX"] = intval($_POST["cordX"]);
    $datos["cordY"] = intval($_POST["cordY"]);
    $datos["color"] = $_POST["color"];
    $datos["grosor"] = intval($_POST["grosor"]);

    if(!validaEntero($datos["cordX"], 0, 500, $datos["cordX"]))
        $errores["cordX"][] = "La coordenada X debe estar entre 0 y 500";

    if(!validaEntero($datos["cordY"], 0, 500, $datos["cordY"]))
        $errores["cordY"][] = "La coordenada Y debe estar entre 0 y 500";

    if($datos["color"] === "" || !key_exists($datos["color"], Punto::COLORES))
        $errores["color"][] = "El color no está entre los indicados";

    if(!key_exists($datos["grosor"], Punto::GROSORES))
        $errores["grosor"][] = "El grosor no está entre los indicados";

    if(empty($errores))
    {
        escrituraFichero("$nombreArchivo.dat", [array_values($datos)]);
        $datos = [
            "cordX"=>0,
            "cordY"=>0,
            "color"=>"black",
            "grosor"=>2
        ];
    }

}


/* Una vez pasadas las comprobaciones, pinto los puntos del array */
foreach($puntos as $punto)
{
    $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
    $color = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
    imagefilledellipse($imagen, $punto->getPosX(), $punto->getPosY(), $punto->getGrosor()*4, $punto->getGrosor()*5,  $color);
}

$rutaImagen = RUTABASE."/imagenes/puntos/$nombreArchivo.jpg";
$rutaEtiquetaImg = "/imagenes/puntos/$nombreArchivo.jpg";

if(!file_exists($rutaImagen)) // Si la imagen no existe la creo
    imagejpeg($imagen, $rutaImagen);

//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 7");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barra);
cuerpo($datos, $errores, $puntos, $rutaEtiquetaImg);
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
    
}

function cuerpo(array $datos, array $errores, array $puntos, string $ruta) {
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
                echo "<input type='radio' name='grosor' value='$clave' ". (($datos["grosor"] === $clave)?"checked":"") .">".PHP_EOL;
            }
        
        ?>
        <br>
        <br>

        <input type="submit" name="guardar" value="Guardar" class="boton">
    </form>
    <hr>
    <textarea name="areaTexto" cols="75" rows="15" ><?php 
            foreach($puntos as $punto)
            {
                echo "Coordenadas: (". $punto->getPosX() ."X, ". $punto->getPosY() ."Y) >> Color: ". mb_strtoupper(Punto::COLORES[$punto->getColor()]["nombre"]) ." - Grosor: ". mb_strtoupper(Punto::GROSORES[$punto->getGrosor()]) ."\r\n";
            }
    ?></textarea>
    <br>
    <img src="<?php echo $ruta ?>" alt="Imagen puntos">
<?php
}