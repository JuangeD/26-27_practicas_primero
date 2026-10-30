<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/pruebas/index.php"
    ],
    [
        "TEXTO" => "pagFormulario"
    ]
];

// inicializadores
$datos = [
    "nombre" => "Juange",
    "precio" => 500
];
$errores = [];

//comprobar si se ha dado a insertar
if (isset($_POST["crear"])) {
    // Verifico el nombre
    $nombre = "";
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $nombre = strtolower(mb_trim($nombre));
    }
    if ($nombre == "")
        $errores["nombre"][] = "Debe indicarse un nombre";
    if (strlen($nombre) > 20)
        $errores["nombre"][] = "El nombre no puede tener mas de 20 caracteres";
    $datos["nombre"] = $nombre;

    // Verifico el precio
    $precio = 0;
    if (isset($_POST["precio"])) {
        $precio = floatval($_POST["precio"]);
    }
    if ($precio <= 0)
        $errores["precio"][] = "Debe indicarse un precio";
    $datos["precio"] = $precio;
    
    if (!$errores) //no hay errores hago la insercion
    {
        //codigo para el nuevo articulo
        $codigo = 1; //codigo
        //se guarda el articulo
        //ir a ver el articulo insertado
        header("location: verArticulo.php?id=$codigo");
        exit;
    }
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("ACCESO PRUEBAS", $barra);
cuerpo($datos, $errores); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo(array $datos, array $errores)
{
?>

<?php
    formulario($datos, $errores);
}

// Funciones
function formulario(array $datos, array $errores)
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?php echo $datos["nombre"]; ?>" size=21
            maxlength="20"><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio"
            value="<?php echo $datos["precio"]; ?>" size=4
            maxlength="3"><br>
        <input type="submit" class="boton" value="Crear" name="crear">
    </form>
<?php


}
