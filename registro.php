<?php

// Se incluye el archivo 'motor.php' que contiene las funciones necesarias para la aplicación
require('libreria/motor.php');

// Se aplica la plantilla de la página
plantilla::aplicar();

// Se crea un nuevo objeto de la clase 'peleador'
$p = new peleador();

// Verifica si se ha enviado un código en la URL para cargar los datos de un peleador existente
if (isset($_GET['codigo'])) {
    $p = cargar_datos($_GET['codigo']); // Se cargan los datos del peleador según su código

    // Si no se encuentra el peleador, muestra un mensaje de error y finaliza la ejecución
    if (!$p) {
        echo "<h1> ⚠ Error";
        echo "<p>El participante no existe.</p>";
        echo "<div class='d-derecha'><a href='index.php' class='boton'>Volver al listado</a></div>";
        exit;
    }

    // Asegurar que la propiedad 'habilidades' sea un array para evitar errores en la iteración
    if (!is_array($p->habilidades)) {
        $p->habilidades = [];
    }
}

?>

<!-- Título del formulario -->
<h1 class="title">Registro de Participantes</h1>
<p>Por favor, ingresa los datos del participante:</p>

<!-- Botón para regresar a la página principal -->
<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a>
</div>

<!-- Formulario para registrar o editar un participante -->
<form method="post" action="guardar.php">
    <?php
    // Se generan los campos del formulario utilizando la función 'my_input'
    echo my_input(nombre: "identificacion", labe: "identificacion", valor: $p->identificacion, extra: ["required" => "required"]);
    echo my_input(nombre: "nombre", labe: "nombre", valor: $p->nombre, extra: ["required" => "required"]);
    echo my_input(nombre: "apellido", labe: "apellido", valor: $p->apellido, extra: ["required" => "required"]);
    echo my_input(nombre: "fecha_nacimiento", labe: "fecha de nacimiento", valor: $p->fecha_nacimiento, extra: ["type" => "date", "required" => "required"]);
    echo my_input(nombre: "foto", labe: "foto", valor: $p->foto, extra: ["type" => "url"]);
    ?>

    <!-- Sección de habilidades -->
    <h3>Habilidades</h3>
    <table>
        <thead>
            <tr>
                <th>nombre</th>
                <th>tipo</th>
                <th>nivel</th>
                <!-- Botón para agregar nuevas habilidades -->
                <td><button style="width: auto" type="button" onclick="agregarHabilidad()">+</button></td>
            </tr>
        </thead>
        <tbody id="tdHabilidades">
            <?php
            // Si el peleador tiene habilidades, se muestran en la tabla
            if (!empty($p->habilidades) && (is_array($p->habilidades) || is_object($p->habilidades))) {
                foreach ($p->habilidades as $habilidad) {
                    echo "<tr>";
                    echo "<td><input type='text' name='habilidades[nombre][]' value='{$habilidad->nombre}'></td>";
                    echo "<td><input type='text' name='habilidades[tipo][]' value='{$habilidad->tipo}'></td>";
                    echo "<td><input type='text' name='habilidades[nivel][]' value='{$habilidad->nivel}'></td>";
                    echo "<td><button onclick='quitarFila(this)'>❌</button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Botón para guardar los datos del participante -->
    <div style="margin: 10px;">
        <button type="submit" class="boton">Guardar</button>
    </div>
</form>

<!-- Script para agregar y eliminar habilidades dinámicamente -->
<script>
    function agregarHabilidad() {
        // Crea una nueva fila para la tabla de habilidades
        var tr = document.createElement("tr");

        // Crea la celda para el nombre de la habilidad
        var td = document.createElement("td");
        var input = document.createElement("input");
        input.type = "text";
        input.name = "habilidades[nombre][]";
        td.appendChild(input);
        tr.appendChild(td);

        // Crea la celda para el tipo de habilidad
        var td = document.createElement("td");
        var input = document.createElement("input");
        input.type = "text";
        input.name = "habilidades[tipo][]";
        td.appendChild(input);
        tr.appendChild(td);

        // Crea la celda para el nivel de la habilidad
        var td = document.createElement("td");
        var input = document.createElement("input");
        input.type = "number";
        input.name = "habilidades[nivel][]";
        td.appendChild(input);
        tr.appendChild(td);

        // Crea la celda con el botón para eliminar la fila
        var td = document.createElement("td");
        var button = document.createElement("button");
        button.innerHTML = "❌";
        button.type = "button";
        button.setAttribute("onclick", "quitarFila(this)");
        td.appendChild(button);
        tr.appendChild(td);

        // Agrega la nueva fila a la tabla de habilidades
        document.getElementById("tdHabilidades").appendChild(tr);
    }

    function quitarFila(boton) {
        // Pregunta al usuario si está seguro de eliminar la habilidad
        if (confirm("¿Está seguro de eliminar esta habilidad?"))
            boton.parentElement.parentElement.remove(); // Elimina la fila seleccionada
    }
</script>
