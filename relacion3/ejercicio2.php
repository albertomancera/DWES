<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 2 - Factorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width:600px;">
        <h3 class="mb-4">Factorial (Iterativo y Recursivo)</h3>

        <!-- Formulario simple que envía por GET al mismo archivo -->
        <form method="get">
            <div class="mb-3">
                <label for="numero" class="form-label">Introduce un número entero (>= 0):</label>
                <input type="number" id="numero" name="numero" class="form-control" min="0" value="<?php echo isset($_GET['numero']) ? (int)$_GET['numero'] : 5; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        include 'relacion3.php';
        // Si se ha enviado el formulario con 'numero', procesamos y mostramos resultados
        if (isset($_GET['numero'])) {
            $numero = (int) $_GET['numero']; // convertir a entero

            if ($numero < 0) {
                // Mensaje para entrada no válida
                echo '<div class="alert alert-danger mt-3">Introduce un número mayor o igual a 0.</div>';
            } else {
                // Mostrar resultados con etiquetas simples
                echo '<div class="mt-3">';
                echo '<div><strong>Iterativo:</strong> ' . factorial_iterativo($numero) . '</div>';
                echo '<div><strong>Recursivo:</strong> ' . factorial_recursivo($numero) . '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>