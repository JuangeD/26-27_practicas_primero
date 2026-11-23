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

$nombreArchivo = "imagen_".obtenerIpNavegador(); // Nombre del archivo
$actualizarImg = false;

/* Subir archivos */
/* Subir archivos */
if(isset($_POST["subir"]) && isset($_FILES["ficheroPuntos"]))
{
    $file = $_FILES["ficheroPuntos"];

    if($file["error"] === UPLOAD_ERR_OK && mime_content_type($file["tmp_name"]) === "text/plain")
    {
        $lineas = file($file["tmp_name"], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if(!file_exists(RUTABASE."/ficheros/$nombreArchivo.dat"))
            resetPuntos($puntos);

        foreach($lineas as $linea)
        {
            $campos = explode(";", $linea);

            if(count($campos) === 4)
            {
                $x = intval(trim($campos[0]));
                $y = intval(trim($campos[1]));
                $color = trim($campos[2]);
                $grosor = intval(trim($campos[3]));
            
                $puntos[] = new Punto($x, $y, $color, $grosor);
            }
        }

        $datosPunto = [];
        foreach($puntos as $punto)
            $datosPunto[] = [$punto->getPosX(), $punto->getPosY(), $punto->getColor(), $punto->getGrosor()];

        escrituraFichero("$nombreArchivo.dat", $datosPunto);
        $actualizarImg = true;
    }
}

/* Borrar puntos */
if(isset($_POST["borrar"]) && isset($_POST["borrarPunto"]))
{
    unset($puntos[intval($_POST["borrarPunto"])]);

    $datos = [];

    foreach($puntos as $punto)
    {
        $datos[] = [$punto->getPosX(), $punto->getPosY(), $punto->getColor(), $punto->getGrosor()];
    }

    escrituraFichero("$nombreArchivo.dat", $datos);
    $actualizarImg = true;
}

/* Datos del formulario */
$datos = [
    "cordX"=>0,
    "cordY"=>0,
    "color"=>"black",
    "grosor"=>2
];
$errores = []; // Errores

/* Guardar puntos */
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
        $datosPunto = [];

        if(!file_exists(RUTABASE."/ficheros/$nombreArchivo.dat"))
            resetPuntos($puntos);
        else
        {
            foreach($puntos as $punto)
            {
                $datosPunto[] = [$punto->getPosX(), $punto->getPosY(), $punto->getColor(), $punto->getGrosor()];
            }
        }
        $datosPunto[] = array_values($datos);

        resetPuntos($puntos);

        escrituraFichero("$nombreArchivo.dat", $datosPunto);

        foreach($datosPunto as $p)
        {
            $puntos[]=new Punto(intval($p[0]), intval($p[1]), $p[2], intval($p[3]));
        }

        $datos = [
            "cordX"=>0,
            "cordY"=>0,
            "color"=>"black",
            "grosor"=>2
        ];
        $actualizarImg = true;
    }

}

// Creación de la imagen
$imagen = imagecreatetruecolor(501,501);

/* Pinto el fondo blanco de la imagen */
$blanco = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $blanco);

/* Pinto el marco negro de la imagen */
$negro = imagecolorallocate($imagen, 0, 0, 0);
imagerectangle($imagen, 0, 0, 500, 500, $negro);

/* Una vez creada la base de la imagen, pinto los puntos del array */
foreach($puntos as $punto)
{
    $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
    $color = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
    imagefilledellipse($imagen, $punto->getPosX(), $punto->getPosY(), $punto->getGrosor()*4, $punto->getGrosor()*5,  $color);
}

$rutaImagen = RUTABASE."/imagenes/puntos/$nombreArchivo.jpg";

if(file_exists($rutaImagen))
    $rutaEtiquetaImg = "/imagenes/puntos/$nombreArchivo.jpg?v=".filemtime($rutaImagen);
else
    $rutaEtiquetaImg = "/imagenes/puntos/$nombreArchivo.jpg";

if(!file_exists(RUTABASE."/ficheros/$nombreArchivo.dat"))
    $actualizarImg = true;

if($actualizarImg) // Actualizo o creo la imagen
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
        <hr>
        <select name="borrarPunto" class="for_select">
            <?php 
                foreach($puntos as $cla => $val)
                {
                    echo "<option value='".$cla."' >". "(". strval($val->getPosX()) ."X, ". strval($val->getPosY()) ."Y) >> ". mb_strtoupper(Punto::COLORES[$val->getColor()]["nombre"]) ." - ". mb_strtoupper(Punto::GROSORES[$val->getGrosor()]) ."</option>".PHP_EOL;
                }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" name="borrar" value="Borrar" class="boton">
    </form>
    <hr>
    <form action="#" method="post" enctype="multipart/form-data">
        <h3>Subir fichero de puntos</h3>
        <input type="file" name="ficheroPuntos" accept=".dat">
        <br><br>
        <input type="submit" name="subir" value="Subir" class="boton">
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
    <br>
    <br>
    <a href="/aplicacion/relacion7/imagen.php" class="boton">Descargar imagen</a>
<?php
}



/* ====== FUNCIONES ====== */
function resetPuntos(array &$puntos): void
{
    foreach($puntos as $key => $value)
    {
        unset($puntos[$key]);
    }
}