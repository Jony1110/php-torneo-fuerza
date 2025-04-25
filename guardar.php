<?php

// Se incluye el archivo 'motor.php' que contiene las funciones necesarias para la aplicación
require('libreria/motor.php');

// Se crea una nueva instancia de la clase 'peleador'
$peleador = new peleador();

// Se asignan los valores enviados por el formulario a las propiedades del objeto 'peleador'
$peleador->identificacion = $_POST['identificacion']; // Identificación del peleador
$peleador->nombre = $_POST['nombre']; // Nombre del peleador
$peleador->apellido = $_POST['apellido']; // Apellido del peleador
$peleador->fecha_nacimiento = $_POST['fecha_nacimiento']; // Fecha de nacimiento del peleador
$peleador->foto = $_POST['foto']; // Foto del peleador

// Se inicializa un arreglo para almacenar las habilidades del peleador
$habilidades = [];

// Se verifica si existen habilidades en el formulario y si están correctamente estructuradas
if (isset($_POST['habilidades']) && is_array($_POST['habilidades']) && isset($_POST['habilidades']['nombre'])) {
    // Se recorre cada habilidad enviada por el formulario
    foreach ($_POST['habilidades']['nombre'] as $i => $nombre) {
        if (!empty($nombre)) { // Se evita guardar habilidades vacías
            $habilidad = new habilidad(); // Se crea un nuevo objeto 'habilidad'
            $habilidad->nombre = $nombre; // Se asigna el nombre de la habilidad
            $habilidad->tipo = $_POST['habilidades']['tipo'][$i] ?? ''; // Se asigna el tipo de habilidad (si está definido)
            $habilidad->nivel = $_POST['habilidades']['nivel'][$i] ?? 0; // Se asigna el nivel de la habilidad (si está definido, si no, 0)
            $habilidades[] = $habilidad; // Se añade la habilidad al arreglo de habilidades
        }
    }
}

// Se asignan las habilidades al peleador
$peleador->habilidades = $habilidades;

// Se guardan los datos del peleador en el sistema
guardar_datos($peleador->identificacion, $peleador);

// Se aplica la plantilla de la página
plantilla::aplicar();

?>

<!-- Mensaje de confirmación de guardado exitoso -->
<h1>Datos Guardados</h1>
<p>Los datos del participante han sido guardados correctamente.</p>

<!-- Botón para volver al listado de participantes -->
<div class="d-derecha">
    <a href="index.php" class="boton">Volver al listado</a>
</div>
