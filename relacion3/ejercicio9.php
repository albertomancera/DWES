<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- declara la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- hace la página responsive -->
    <title>9. Palabra más larga</title> <!-- título que aparece en la pestaña del navegador -->
    <!-- Incluye Bootstrap desde CDN para estilos rápidos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <!-- Enlace a estilos locales del proyecto (opcional) -->
    <link rel="stylesheet" href="../Bootstrap Templates/src/styles/formStyle.css">
</head>
<body>
    <!-- Contenedor central con utilidades de Bootstrap para centrar el formulario -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
        <!-- Formulario que envía datos por GET al mismo script -->
        <form class="border border-0 rounded-4 shadow-lg p-4 p-4 bg-secondary bg-opacity-25"
            method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form1">

            <!-- Título del formulario -->
            <h1 class="mb-4 text-center text-primary fw-bold">¿Cuál es la palabra más larga?</h1>

            <!-- Grupo de entrada: etiqueta + campo de texto -->
            <div class="mb-3">
                <label for="texto" class="form-label">Introduzca un texto:</label> <!-- etiqueta para accesibilidad -->
                <input class="form-control rounded-3 bg-secondary bg-opacity-25 border"
                    type="text" name="texto" id="texto" /> <!-- campo donde el usuario escribe el texto -->
            </div>

            <!-- Botones: enviar y reset -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-success me-md-2" type="submit">Enviar</button> <!-- envía el formulario -->
                <button class="btn btn-outline-secondary" type="reset">Borrar</button> <!-- limpia el formulario -->
            </div>
        </form>
    </div>

    <!-- Scripts de Bootstrap (Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

    <?php
    // ------------------------
    // Función: palabraMasLarga
    // ------------------------
    // Esta función lee el parámetro 'texto' de la URL (si existe),
    // divide la cadena en palabras separadas por espacios y calcula
    // cuál es la palabra con más caracteres. Finalmente imprime el resultado.
    function palabraMasLarga() {
        // Comprueba si el parámetro 'texto' está presente en la query string
        if (isset($_GET['texto'])) {
            // Guarda el texto recibido en la variable $texto
            $texto = $_GET['texto'];

            // Separa la cadena por espacios simples en un array $palabra
            // explode(" ", $texto) devuelve un array donde cada elemento es una palabra
            $palabra = explode(" ", $texto);

            // Inicializa $pos (índice de la palabra más larga) y $length (longitud máxima encontrada)
            $pos = 0;     // posición por defecto
            $length = 0;  // longitud máxima inicial

            // Recorre todas las palabras del array
            for ($i = 0; $i < count($palabra); $i++) {
                // strlen($palabra[$i]) obtiene la longitud de la palabra en la posición $i
                if ($length < strlen($palabra[$i])) {
                    // Si la palabra actual es más larga que la máxima conocida, actualizamos valores
                    $length = strlen($palabra[$i]); // nueva longitud máxima
                    $pos = $i;                       // guardamos la posición de la palabra más larga
                }
            }

            // Imprime el resultado dentro de un div centrado
            echo "<div class='text-center me-5'><br>";
            // Muestra la palabra más larga encontrada; nota: no se escapa la salida en el original
            echo "<p class='mt-2'>La palabra más larga es " . $palabra[$pos] . "</p></div>";
        }
    }

    // Llamada a la función para que se ejecute cuando se cargue la página
    palabraMasLarga();
    ?>

</body>
</html>