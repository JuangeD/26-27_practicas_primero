<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

//CONTROLADOR
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"relacion5"
    ]
];

$valores = [
    "hermanos"=>0,
    "sueldo"=>1100
];
$errores = [];

if(isset($_POST["envio"]))
{
    /* Obtengo los datos enviados por el formulario */
    $nombre = mb_strtoupper($_POST["nombre"]); 
    $contrasenia = $_POST["contrasenia"];
    $repetirContrasenia = $_POST["repetirContrasenia"];
    $nacimiento = $_POST["nacimiento"];
    $carnet = $_POST["diaCarnet"] . "/" . $_POST["mesCarnet"] . "/" . $_POST["anioCarnet"];
    $levantarse = $_POST["levantarse"];
    $estado = htmlspecialchars($_POST["estado"]);
    $estudios = $_POST["estudios"];
    $hermanos = $_POST["hermanos"];
    $sueldo = $_POST["sueldo"];

    /* Validación del nombre */
    if(($nombre==="") && !validaExpresion($nombre, "/^[^H][A-Z]{1,25}/", "NOMBRE DEFECTO"))
        $errores["nombre"][] = "Nombre: máximo 25 caracteres y no puede estar vacío ni empezar por H";

    $valores["nombre"]=$nombre;

    /* Validación de contraseña */
    if(!validaExpresion($contrasenia, "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\$_\-;<>@])[A-Za-z\d\$_\-;<>@]{8,15}/", "contraseña"))
        $errores["contrasenia"][] = "Contraseña: debe tener mínimo 8 caracteres, con caracteres especiales, mayúsculas, minúsculas y una cifra";

    $valores["contrasenia"]=$contrasenia;

    /* Validación de repetir la contraseña */
    if($contrasenia!==$repetirContrasenia)
        $errores["repetirContrasenia"][] = "Repetir contraseña: deben coincidir las contraseñas";

    $valores["repetirContrasenia"]=$repetirContrasenia;

    /* Validación de fecha nacimiento */
    if(!validaFecha($nacimiento, new DateTime()->format("d/m/Y")))
        $errores["nacimiento"][] = "Nacimiento: la fecha de nacimiento tiene que tener el formato dd/mm/aaaa";

    $valores["nacimiento"]=$nacimiento;

    /* Validación de fecha de carnet */
    if(!validaFecha($carnet, new DateTime()->format("d/m/Y")))
    {
        $errores["carnet"][] = "Carnet: la fecha de carnet tiene que tener el formato dd/mm/aaaa";
    }
    else
    {
        $fechaNacimientoMas18 = DateTime::createFromFormat("d/m/Y", $nacimiento)->add(new DateInterval("P18Y"));
        $fechaCarnet = DateTime::createFromFormat("d/m/Y", $carnet);
        
        if(!($fechaCarnet>=$fechaNacimientoMas18))
            $errores["carnet"][] = "Carnet: debes ser mayor de 18 años";
    }

    $valores["carnet"]=$carnet;

    /* Validación de hora de levantarse */
    if(!validaHora($levantarse, new DateTime()->format("H:i:s")))
        $errores["levantarse"][]="Hora de levantarse: debe indicarse la hora en formato hh:mm:ss";

    $valores["levantarse"]=$levantarse;

    /* Validación del estado */
    if(!validaEntero($estado, 1, 4, 1))
        $errores["estado"][]="Estado: debe indicarse mínimo un estado";

    switch($estado)
    {
        case 1:
            $valores["estado"]="estudiante";
        break;
        case 2:
            $valores["estado"]="en paro";
        break;
        case 3:
            $valores["estado"]="trabajando";
        break;
        case 4:
            $valores["estado"]="jubilado";
        break;
    }

    /* Validación de estudios */
    if(!isset($estudios))
        $errores["estudios"][]="Estudios: debe indicarse al menos una titulación";

    if(count($estudios)>6)
        $errores["estudios"][]="Estudios: se debe indicar un código de opción válido de entre 0 y 5";
    
    if(validaRango(0, $estudios))
        $valores["estudios"]=[0=>"0"];
    else
        $valores["estudios"]=$estudios;

    /* Validación del número de hermanos */
    if(!validaEntero($hermanos, 0, 20, 0))
        $errores["hermanos"][]="Hermanos: debe indicarse un número de hermanos entre 0 y 20";

    $valores["hermanos"]=$hermanos;

    /* Validación del sueldo */
    if(!validaReal($sueldo, 1000, 150000, 1100))
        $errores["sueldo"][]="Sueldo: debe indicarse un sueldo de entre 1000 y 150000";

    $valores["sueldo"]=$sueldo;

}


//*****************************
//DIBUJAR PLANTILLA VISTA
inicioCabecera("Relación 5");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5", $barra);
cuerpo($valores, $errores);
finCuerpo();
//*****************************

//VISTA
function cabecera() {
?>
    
<?php
    
}

function cuerpo(array $valores, array $errores) {
?>
    <h2>Prueba funciones</h2>
    <nav class="barraMenu">
        <ul>
            <li><a href="pruebaFunciones.php">Prueba</a></li>
        </ul>
    </nav>
    <h2>Formulario</h2>
<?php

    if(isset($_POST["envio"]) && empty($errores))
    {
        ?>
            <h2>Resumen de formulario</h2>
            <div>
                <p><strong>Nombre: </strong><?php echo $valores["nombre"]?></p>
                <p><strong>Contraseña: </strong><?php echo $valores["contrasenia"]?></p>
                <p><strong>Fecha nacimiento: </strong><?php echo $valores["nacimiento"]?></p>
                <p><strong>Fecha carnet: </strong><?php echo $valores["carnet"]?></p>
                <p><strong>Hora de levantarse: </strong><?php echo $valores["levantarse"]?></p>
                <p><strong>Estado: </strong><?php echo $valores["estado"]?></p>
                <p><strong>Estudios: </strong><?php 
                    foreach($valores["estudios"] as $clave)
                    {
                        switch($clave) {
                            case 0:
                                echo "sin estudios";
                            break;
                            case 1:
                                echo "primaria ";
                            break;
                            case 2:
                                echo "secundaria ";
                            break;
                            case 3:
                                echo "bachillerato ";
                            break;
                            case 4:
                                echo "ciclo formativo ";
                            break;
                            case 5:
                                echo "universitarios ";
                            break;
                        }
                    }
                ?></p>
                <p><strong>Hermanos: </strong><?php echo $valores["hermanos"]?></p>
                <p><strong>Sueldo: </strong><?php echo $valores["sueldo"]?></p>
            </div>
        <?php
    }
    else
        mostrarFormulario($valores, $errores);
}

/* ====== FUNCIONES ====== */
function mostrarFormulario(array $valores, array $errores)
{
    if ($errores) { // Muestro los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
?>
    <form action="index.php" method="post">
        <!-- CAMPO DE NOMBRE -->
        <label for="nombre"><strong>Nombre:</strong> </label>
        <input type="text" name="nombre" id="nombre" maxlength="25" value="<?php if(isset($valores["nombre"])) echo $valores["nombre"] ?>">
        <br>
        <br>
        <!-- CAMPO DE CONTRASEÑA -->
        <label for="contrasenia"><strong>Contraseña:</strong> </label>
        <input type="password" name="contrasenia" id="contrasenia" maxlength="15" value="<?php if(isset($valores["contrasenia"])) echo $valores["contrasenia"] ?>">
        <br>
        <br>
        <label for="repetirContrasenia"><strong>Repetir contraseña:</strong> </label>
        <input type="password" name="repetirContrasenia" id="repetirContrasenia" maxlength="15" value="<?php if(isset($valores["repetirContrasenia"])) echo $valores["repetirContrasenia"] ?>">
        <br>
        <br>
        <!-- CAMPO DE FECHA NACIMIENTO -->
        <label for="nacimiento"><strong>Fecha nacimiento:</strong> </label>
        <input type="text" name="nacimiento" id="nacimiento" value="<?php if(isset($valores["nacimiento"])) echo $valores["nacimiento"] ?>">
        <br>
        <br>
        <!-- CAMPO DE FECHA CARNET -->
        <label for="carnet"><strong>Fecha carnet:</strong> </label>
        <input type="text" name="diaCarnet" id="diaCarnet" value="<?php if(isset($valores["carnet"])) echo $valores["carnet"]->format("d") ?>">
        /
        <input type="text" name="mesCarnet" id="mesCarnet" value="<?php if(isset($valores["carnet"])) echo $valores["carnet"]->format("m") ?>">
        /
        <input type="text" name="anioCarnet" id="anioCarnet" value="<?php if(isset($valores["carnet"])) echo $valores["carnet"]->format("Y") ?>">
        <br>
        <br>
        <!-- CAMPO DE HORA DE LEVANTARSE -->
        <label for="levantarse"><strong>Hora de levantarse:</strong> </label>
        <input type="text" name="levantarse" id="levantarse">
        <br>
        <br>
        <!-- RADIOBUTTONS ESTADO -->
        <label for="estado"><strong>Estado:</strong> </label>

        <label for="estudiante">Estudiante</label>
        <input type="radio" name="estado" id="estado" value="1" <?php if(isset($valores["estado"]) && ($valores["estado"]==="estudiante")) echo "checked"; ?>>

        <label for="paro">- En paro</label>
        <input type="radio" name="estado" id="estado" value="2" <?php if(isset($valores["estado"]) && ($valores["estado"]==="en paro")) echo "checked"; ?>>

        <label for="trabajando">- Trabajando</label>
        <input type="radio" name="estado" id="estado" value="3" <?php if(isset($valores["estado"]) && ($valores["estado"]==="trabajando")) echo "checked"; ?>>

        <label for="jubilado">- Jubilado</label>
        <input type="radio" name="estado" id="estado" value="4" <?php if(isset($valores["estado"]) && ($valores["estado"]==="jubilado")) echo "checked"; ?>>
        <br>
        <br>
        <!-- CHECKBOXES ESTUDIOS -->
        <label><strong>Estudios:</strong> </label>

        <label for="sinEstudios">Sin estudios</label>
        <input type="checkbox" name="estudios[]" value="0" <?php if(isset($valores["estudios"]) && (in_array("sin estudios", $valores["estudios"]))) echo "checked"; ?>>

        <label for="primaria">- Primaria</label>
        <input type="checkbox" name="estudios[]" value="1" <?php if(isset($valores["estudios"]) && (in_array("primaria", $valores["estudios"]))) echo "checked"; ?>>

        <label for="secundaria">- Secundaria</label>
        <input type="checkbox" name="estudios[]" value="2" <?php if(isset($valores["estudios"]) && (in_array("secundaria", $valores["estudios"]))) echo "checked"; ?>>

        <label for="bachillerato">- Bachillerato</label>
        <input type="checkbox" name="estudios[]" value="3" <?php if(isset($valores["estudios"]) && (in_array("bachillerato", $valores["estudios"]))) echo "checked"; ?>>

        <label for="cicloFormativo">- Ciclo formativo</label>
        <input type="checkbox" name="estudios[]" value="4" <?php if(isset($valores["estudios"]) && (in_array("ciclo formativo", $valores["estudios"]))) echo "checked"; ?>>

        <label for="universitarios">- Universitarios</label>
        <input type="checkbox" name="estudios[]" value="5" <?php if(isset($valores["estudios"]) && (in_array("universitarios", $valores["estudios"]))) echo "checked"; ?>>

        <br>
        <br>

        <!-- NUMERO HERMANOS -->
        <label for="hermanos"><strong>Número de hermanos:</strong> </label>
        <input type="number" name="hermanos" id="hermanos" value="<?php echo $valores["hermanos"]?>">
        <br>
        <br>
        <!-- SUELDO -->
        <label for="sueldo"><strong>Sueldo:</strong> </label>
        <input type="number" name="sueldo" id="sueldo" value="<?php echo $valores["sueldo"]?>">

        <br>
        <br>
        <input type="submit" class="boton" value="Enviar" name="envio">
    </form>
<?php
}