<?php

require('libreria/motor.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];

    // Verifica que el archivo de datos exista
    $archivo = "datos/{$codigo}.dat";
    if (file_exists($archivo)) {
        unlink($archivo); // Elimina el archivo
        echo json_encode(["success" => true, "message" => "Participante eliminado correctamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "No se encontró el participante"]);
    }
}
?>
