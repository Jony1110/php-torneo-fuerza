<?php

// Establece la zona horaria predeterminada para la ejecución del script
// En este caso, se configura a la hora de Santo Domingo, República Dominicana
date_default_timezone_set('America/Santo_Domingo');

// Obtiene la marca de tiempo actual en segundos desde el 1 de enero de 1970 (Epoch Unix)
$t = time();

// Muestra la fecha y hora actual en el formato "Año-Mes-Día Hora:Minuto:Segundo"
// utilizando la marca de tiempo obtenida anteriormente
echo date("Y-m-d H:i:s", $t);

?>
