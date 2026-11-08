<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

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
    mostrarFormulario($valores, $errores);
}

/* ====== FUNCIONES ====== */
function mostrarFormulario(array $valores, array $errores)
{
?>
    <form action="index.php" method="post">
        <!-- CAMPO DE NOMBRE -->
        <label for="nombre"><strong>Nombre:</strong> </label>
        <input type="text" name="nombre" id="nombre" maxlength="25">
        <br>
        <br>
        <!-- CAMPO DE CONTRASEÑA -->
        <label for="contrasenia"><strong>Contraseña:</strong> </label>
        <input type="password" name="contrasenia" id="contrasenia" maxlength="15">
        <br>
        <br>
        <!-- CAMPO DE FECHA NACIMIENTO -->
        <label for="fechaNac"><strong>Fecha nacimiento:</strong> </label>
        <input type="text" name="fechaNac" id="fechaNac">
        <br>
        <br>
        <!-- CAMPO DE FECHA CARNET -->
        <label for="fechaCar"><strong>Fecha carnet:</strong> </label>
        <input type="text" name="fechaCar" id="fechaCar">
        <br>
        <br>
        <!-- CAMPO DE HORA DE LEVANTARSE -->
        <label for="horaLevantarse"><strong>Hora de levantarse:</strong> </label>
        <input type="text" name="horaLevantarse" id="horaLevantarse">
        <br>
        <br>
        <!-- RADIOBUTTONS ESTADO -->
        <label for="estado"><strong>Estado:</strong> </label>

        <label for="estudiante">Estudiante</label>
        <input type="radio" name="estado" id="estado">

        <label for="paro">- En paro</label>
        <input type="radio" name="estado" id="estado">

        <label for="trabajando">- Trabajando</label>
        <input type="radio" name="estado" id="estado">

        <label for="jubilado">- Jubilado</label>
        <input type="radio" name="estado" id="estado">
        <br>
        <br>
        <!-- CHECKBOXES ESTUDIOS -->
        <label for="estudios"><strong>Estudios:</strong> </label>

        <label for="sinEstudios">Sin estudios</label>
        <input type="checkbox" name="estudios">

        <label for="sinEstudios">- Primaria</label>
        <input type="checkbox" name="estudios[]">

        <label for="sinEstudios">- Secundaria</label>
        <input type="checkbox" name="estudios[]">

        <label for="sinEstudios">- Bachillerato</label>
        <input type="checkbox" name="estudios[]">

        <label for="sinEstudios">- Ciclo formativo</label>
        <input type="checkbox" name="estudios[]">

        <label for="sinEstudios">- Universitarios</label>
        <input type="checkbox" name="estudios[]">

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
    </form>
<?php
}