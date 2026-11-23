<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Crear la imagen al vuelo con los puntos actuales
$imagen = imagecreatetruecolor(501, 501);

$blanco = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $blanco);

$negro = imagecolorallocate($imagen, 0, 0, 0);
imagerectangle($imagen, 0, 0, 500, 500, $negro);

foreach($puntos as $punto)
{
    $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
    $color = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
    imagefilledellipse($imagen, $punto->getPosX(), $punto->getPosY(), $punto->getGrosor()*4, $punto->getGrosor()*5, $color);
}

// Cabeceras para forzar la descarga
$nombreDescarga = "imagen_" . obtenerIpNavegador() . ".jpg";
header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=\"$nombreDescarga\"");

imagejpeg($imagen);