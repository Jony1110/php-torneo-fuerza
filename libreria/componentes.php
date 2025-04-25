<?php

// Función para generar un campo de entrada (input) en HTML
function my_input($nombre, $labe, $valor = "", $extra = []){

    // Se definen valores por defecto para el tipo de input y el atributo required
    $type = "text";
    $required = "";

    // Se extraen valores adicionales pasados en el array $extra (como 'type' y 'required')
    extract($extra);

    // Se devuelve un bloque de código HTML con el input formateado
    return <<<HTML
<div style="margin:10px">
    <label for="{$nombre}">{$labe}:</label><br/>
    <input {$required} type="$type" style="width: 98.5%;" value="{$valor}" name="{$nombre}" id="identificacion">
</div>
HTML;
}

// Función para guardar datos en un archivo
function guardar_datos($codigo, $datos){
    
    // Se verifica si el directorio "datos" existe, si no, se crea
    if(!is_dir("datos")){
        mkdir("datos");
    }

    // Se guarda el contenido serializado en un archivo dentro del directorio "datos"
    file_put_contents("datos/{$codigo}.dat", serialize($datos));
}

// Función para cargar los datos de un archivo específico
function cargar_datos($codigo){

    // Se verifica si el archivo existe, si no, se devuelve "false"
    if(!file_exists("datos/{$codigo}.dat")){
        return false;
    }

    // Se lee el contenido del archivo
    $datos = file_get_contents("datos/{$codigo}.dat");

    // Se deserializa el contenido y se devuelve como un objeto o array
    return unserialize($datos);
}

// Función para listar todos los registros guardados
function listar_registros(){

    // Se inicializa un array vacío donde se almacenarán los registros
    $registros = [];

    // Se obtienen los nombres de los archivos en el directorio "datos"
    $archivos = scandir("datos");

    // Se recorren los archivos encontrados
    foreach($archivos as $archivo){

        // Se verifica si el archivo es realmente un archivo y no un directorio
        if(!is_file("datos/{$archivo}")){
            continue;
        }

        // Se cargan los datos del archivo eliminando la extensión ".dat"
        $datos = cargar_datos(str_replace(".dat", "", $archivo));

        // Se añaden los datos al array de registros
        $registros[] = $datos;
    }

    // Se devuelve el array con todos los registros
    return $registros;
}
