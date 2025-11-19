<!DOCTYPE html>
<!-- Documento HTML5 -->
<html lang="es">

<head>
    <!-- Metadatos y responsive -->
    <meta charset="UTF-8"> <!-- Codificación UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace la página responsive -->
    <title>Ejercicio 1 - Relación 3</title> <!-- Título que aparece en la pestaña del navegador -->

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Pequeños estilos locales para ajustar la apariencia -->
    <style>
        /* Centrar la tarjeta y darle un poco de espacio */
        body { background: #f8f9fa; }
        .center-card { max-width: 720px; margin: 30px auto; }
    </style>
</head>

<body>
    <!-- Contenedor principal con una tarjeta centrada -->
    <main class="container center-card">
        <!-- Tarjeta Bootstrap que contiene el formulario -->
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Título de la tarjeta -->
                <h1 class="h4 mb-3">Calculadora de números primos</h1>

                <!-- Formulario: envía por GET al mismo script -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                    <!-- Grupo de formulario para el número -->
                    <div class="mb-3">
                        <label for="num1" class="form-label">Introduce número (>=1):</label>
                        <input type="number" class="form-control" id="num1" name="num1" min="1" placeholder="Ej. 50" required>
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Calcular primos</button>
                        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-outline-secondary">Limpiar</a>
                    </div>
                </form>

                <!-- Resultado: bloque PHP que procesa la petición GET y muestra primos -->
                <div class="mt-4">
                    <?php
                    // Si existen parámetros en GET (se ha enviado el formulario)
                    if (!empty($_GET)) {
                        // Incluir el fichero que contiene la función isPrimo (debe existir)
                        // Comentario: la ruta 'relacion3.php' debe definir isPrimo()
                        include 'relacion3.php';

                        // Recuperamos el número enviado por el usuario (seguro usar filter_input si se quiere más control)
                        $num = isset($_GET['num1']) ? (int) $_GET['num1'] : 0; // Convertir a entero

                        // Mostrar mensaje si el número es menor que 1
                        if ($num < 1) {
                            echo '<div class="alert alert-warning">Introduce un número mayor o igual a 1.</div>';
                        } else {
                            // Cabecera de resultados
                            echo '<div class="mb-2">Números primos hasta ' . htmlspecialchars($num) . ':</div>';
                            echo '<div class="border rounded p-2 bg-white">';

                            // Recorremos desde 1 hasta el número indicado
                            for ($j = 2; $j <= $num; $j++) {
                                // Llamamos a la función isPrimo para comprobar si j es primo
                                if (isPrimo($j)) {
                                    // Mostrar el número primo como una etiqueta con separación
                                    echo '<span class="badge bg-primary me-1">' . $j . '</span>';
                                }
                            }

                            echo '</div>'; // cierre del contenedor de resultados
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS (bundle incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>