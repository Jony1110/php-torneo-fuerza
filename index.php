<?php

// Se incluye el archivo 'motor.php' que contiene funciones necesarias para la aplicación
require('libreria/motor.php');

// Se aplica la plantilla de la página utilizando la función estática de la clase 'Plantilla'
plantilla::aplicar();

?>

<!-- Encabezado de la página -->
<h1 class="title">Torneo de la Fuerza</h1>
<p>Bienvenido a la competencia más grande de artes marciales</p>
<p>Participantes registrados:</p>

<!-- Contenedor de botones para registrar participantes y ver estadísticas -->
<div class="d-derecha">
    <a href="registro.php" class="boton">Registrar Participantes</a>
    <a href="panel.php" class="boton">Estadísticas</a>
</div>

<!-- Tabla para mostrar la lista de participantes -->
<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Signo Zodiacal</th>
            <th>Habilidades</th>
            <th>Detalle</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        <?php
        // Se obtiene la lista de registros de participantes
        $datos = listar_registros();

        // Se recorre cada participante para mostrar sus datos en la tabla
        foreach ($datos as $peleador) {
            echo "
                <tr>
                    <!-- Muestra la foto del participante -->
                    <td><img src='{$peleador->foto}' alt='{$peleador->nombre}' width='50'></td>
                    
                    <!-- Muestra el nombre y apellido -->
                    <td>{$peleador->nombre} {$peleador->apellido}</td>
                    
                    <!-- Muestra la edad del participante -->
                    <td>{$peleador->edad()}</td>
                    
                    <!-- Muestra el signo zodiacal del participante -->
                    <td>{$peleador->signo_zodiacal()}</td>
                    
                    <!-- Muestra la cantidad de habilidades que tiene -->
                    <td>{$peleador->n_habilidades()}</td>
                    
                    <!-- Enlace para ver los detalles del participante -->
                    <td><a href='registro.php?codigo={$peleador->identificacion}' class='btn-detalle'>Ver Detalle</a></td>
                    
                    <!-- Botón para eliminar el participante, enviando su ID al script de eliminación -->
                    <td><button class='btn-eliminar' onclick='eliminarParticipante(" . json_encode($peleador->identificacion) . ", this)'>❌</button></td>
                </tr>
            ";
        }
        ?>
    </tbody>
</table>

<!-- Script de confirmación y eliminación de participante -->
<script>
    /**
     * Función para eliminar un participante sin recargar la página.
     * @param {number} codigo - Identificación del participante a eliminar.
     * @param {HTMLElement} boton - Botón que fue presionado para eliminar el participante.
     */
    function eliminarParticipante(codigo, boton) {
        // Confirmación antes de eliminar
        if (!confirm("¿Estás seguro de que quieres eliminar este participante?")) {
            return;
        }

        // Se envía la solicitud de eliminación al servidor mediante Fetch API
        fetch('eliminar.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `codigo=${codigo}`
        })
        .then(response => response.json()) // Se convierte la respuesta en JSON
        .then(data => {
            if (data.success) {
                // Si la eliminación fue exitosa, se elimina la fila de la tabla
                let fila = boton.closest("tr");
                fila.remove();
            } else {
                // Si hubo un error, se muestra un mensaje de alerta
                alert("Error: " + data.message);
            }
        })
        .catch(error => console.error('Error:', error)); // Captura errores en la solicitud
    }
</script>
