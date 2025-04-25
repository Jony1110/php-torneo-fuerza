<?php

// Definición de la clase 'habilidad'
class habilidad {
    var $nombre = ""; // Nombre de la habilidad
    var $tipo = "";   // Tipo de habilidad
    var $nivel = 0;   // Nivel de la habilidad
}

// Definición de la clase 'peleador'
class peleador {
    
    var $identificacion = ""; // Identificación única del peleador
    var $nombre = "";         // Nombre del peleador
    var $apellido = "";       // Apellido del peleador
    var $fecha_nacimiento = ""; // Fecha de nacimiento del peleador
    var $foto = "";           // URL de la foto del peleador
    var $habilidades = [];    // Lista de habilidades del peleador

    // Función para calcular la edad del peleador
    function edad() {
        $fecha_n = strtotime($this->fecha_nacimiento); // Convierte la fecha de nacimiento en timestamp
        $fecha_actual = time(); // Obtiene el timestamp actual
        $edad = ($fecha_actual - $fecha_n) / (60 * 60 * 24 * 365.25); // Cálculo de la edad en años
        return floor($edad); // Devuelve la edad redondeada hacia abajo
    }

    // Función para contar el número de habilidades del peleador
    function n_habilidades() {
        return count($this->habilidades); // Cuenta la cantidad de habilidades en el array
    }

    // Función que determina el signo zodiacal del peleador
    function signo_zodiacal() {
        $fecha = strtotime($this->fecha_nacimiento); // Convierte la fecha en timestamp
        $mes = date("m", $fecha); // Obtiene el mes de la fecha
        $dia = date("d", $fecha); // Obtiene el día de la fecha

        // Determina el signo zodiacal basándose en el mes y el día de nacimiento
        if (($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18)) {
            return "acuario";
        } else if (($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) {
            return "piscis";
        } else if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19)) {
            return "aries";
        } else if (($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20)) {
            return "tauro";
        } else if (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) {
            return "géminis";
        } else if (($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22)) {
            return "cáncer";
        } else if (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) {
            return "leo";
        } else if (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) {
            return "virgo";
        } else if (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22)) {
            return "libra";
        } else if (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21)) {
            return "escorpio";
        } else if (($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21)) {
            return "sagitario";
        } else if (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19)) {
            return "capricornio";
        }
    }
}
