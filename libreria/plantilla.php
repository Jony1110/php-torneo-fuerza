<?php

// Definición de la clase Plantilla, utilizada para manejar la estructura visual de la página
class Plantilla
{
    // Variable estática para aplicar el patrón Singleton y evitar múltiples instancias de la clase
    static $instance = null;

    // Método estático para aplicar la plantilla
    public static function aplicar()
    {
        // Si la instancia no ha sido creada, se crea una nueva
        if (self::$instance == null) {
            self::$instance = new Plantilla();
        }
    }

    // Constructor de la clase Plantilla
    public function __construct()
    {
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Torneo de la Fuerza</title>

            <!-- Enlace a una fuente moderna para mejorar la estética del diseño -->
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

            <style>
                /* Estilos generales del cuerpo */
                body {
                    font-family: 'Roboto', sans-serif;
                    /* Fuente moderna */
                    margin: 0;
                    padding: 0;
                    color: white;
                    background-image: url('Img/dragon.jpg');
                    /* Imagen de fondo con temática de Dragon Ball */
                    background-size: cover;
                    /* Ajustar la imagen de fondo */
                    background-position: center center;
                    /* Centrar la imagen */
                    background-attachment: fixed;
                    /* Mantener la imagen fija al hacer scroll */
                    background-color: rgba(0, 0, 0, 0.6);
                    /* Fondo oscuro para mejorar la legibilidad */
                }

                /* Contenedor principal de la página */
                .container {
                    width: 90%;
                    max-width: 1200px;
                    margin: 30px auto;
                    padding: 20px;
                    background-color: rgba(255, 165, 0, 0.8);
                    /* Naranja inspirado en Goku */
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
                    /* Sombra para dar profundidad */
                    border-radius: 12px;
                    min-height: 700px;
                    text-align: center;
                    border: 3px solid #f57c00;
                    /* Borde con un tono más oscuro de naranja */
                }

                /* Estilo para los encabezados principales */
                h1 {
                    font-size: 3.5em;
                    color: #ffcc00;
                    /* Amarillo brillante como el aura de Goku */
                    margin-bottom: 30px;
                    text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.6);
                    /* Sombra negra para mejorar legibilidad */
                    text-transform: uppercase;
                    /* Convertir el texto a mayúsculas */
                }

                /* Estilos para los párrafos */
                p {
                    font-size: 1.5em;
                    color: #f5f5f5;
                    line-height: 1.6;
                    text-align: center;
                }

                /* Estilos para etiquetas y campos de entrada */
                label,
                input {
                    font-size: 1.2em;
                    color: rgb(0, 0, 0);
                }

                /* Alinear etiquetas a la izquierda dentro del contenedor */
                .container,
                label {
                    text-align: left;
                }

                /* Asegurar que el título esté centrado */
                h1.title {
                    text-align: center;
                }

                /* Estilos de los campos de entrada */
                input {
                    padding: 12px;
                    margin-top: 10px;
                    width: 95%;
                    border: 2px solid #ffcc00;
                    /* Detalle dorado */
                    border-radius: 6px;
                    background-color: #fff;
                    color: #333;
                }

                /* Estilos de la tabla */
                table {
                    width: 100%;
                    margin-top: 30px;
                    border-collapse: collapse;
                }

                /* Estilos para las celdas de la tabla */
                th,
                td {
                    padding: 16px;
                    text-align: left;
                    border-bottom: 1px solid #e0e0e0;
                    font-size: 1.2em;
                }

                /* Estilo específico para las celdas */
                td {
                    color: black;
                    /* Color del texto negro */
                    background-color: #f9f9f9;
                    /* Fondo blanco claro */
                    padding: 12px;
                    text-align: left;
                    font-size: 1.1em;
                    border-bottom: 1px solid #e0e0e0;
                }

                /* Estilos para los encabezados de la tabla */
                th {
                    background-color: #2980b9;
                    /* Azul de fondo */
                    color: white;
                    /* Texto blanco */
                    padding: 12px;
                    text-align: left;
                    font-size: 1.2em;
                    font-weight: bold;
                }

                /* Estilos para los botones */
                .boton {
                    background-color: #e91e63;
                    /* Rojo fuerte de la energía destructiva */
                    color: white;
                    padding: 12px 24px;
                    font-size: 1.3em;
                    text-align: center;
                    text-decoration: none;
                    border-radius: 8px;
                    cursor: pointer;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                    border: none;
                }

                /* Efecto al pasar el mouse sobre los botones */
                .boton:hover {
                    background-color: #d81b60;
                    transform: scale(1.1);
                }

                /* Efecto al presionar los botones */
                .boton:active {
                    transform: scale(0.95);
                }

                /* Estilo para el enlace "Ver Detalle" con diseño de botón */
                .btn-detalle {
                    display: inline-block;
                    background-color: #3498db;
                    /* Azul */
                    color: white;
                    padding: 10px 18px;
                    font-size: 1em;
                    text-align: center;
                    text-decoration: none;
                    border-radius: 6px;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                }

                /* Cambio de color al pasar el mouse sobre "Ver Detalle" */
                .btn-detalle:hover {
                    background-color: #2980b9;
                    /* Azul más oscuro */
                    transform: scale(1.05);
                }

                /* Efecto al presionar */
                .btn-detalle:active {
                    transform: scale(0.95);
                }

                /* Botón de eliminar */
                .btn-eliminar {
                    display: inline-block;
                    background-color: #e74c3c;
                    /* Rojo */
                    color: white;
                    padding: 8px 12px;
                    font-size: 1em;
                    text-align: center;
                    text-decoration: none;
                    border-radius: 6px;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                }

                /* Cambio de color al pasar el mouse */
                .btn-eliminar:hover {
                    background-color: #c0392b;
                    transform: scale(1.05);
                }

                /* Efecto al presionar */
                .btn-eliminar:active {
                    transform: scale(0.95);
                }


                /* Estilo del pie de página */
                .footer {
                    margin-top: 51px;
                    text-align: center;
                    color: #ffcc00;
                    /* Texto amarillo brillante */
                    font-size: 1.1em;
                    border-top: 1px solid #ffcc00;
                    padding: 15px;
                    background-color: rgba(0, 0, 0, 0.6);
                    /* Fondo oscuro */
                }

                /* Alinear elementos a la derecha */
                .d-derecha {
                    text-align: right;
                }
            </style>

        </head>

        <body>
            <div class="container">

                <?php
    }

    // Destructor para cerrar la plantilla y agregar el pie de página
    public function __destruct()
    {
        ?>
            </div> <!-- Fin del contenedor principal -->

            <!-- Pie de página -->
            <div class="footer">
                <p>Desarrollado por Jonathan Frias - ¡Con el poder de Goku!</p>
            </div>
        </body>

        </html>
        <?php
    }
}
?>