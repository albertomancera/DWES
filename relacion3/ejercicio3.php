<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 3 - MCD (Euclides)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f8f9fa;} .center{max-width:700px;margin:30px auto;}</style>
</head>
<body>
    <main class="container center">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-3">Cálculo del MCD (Euclides)</h3>
                <p class="text-muted">Prueba las dos versiones (división/resta) en iterativa y recursiva.</p>

                <!-- Formulario simple -->
                <form method="get" class="row g-2 align-items-end">
                    <div class="col-sm-5">
                        <label for="a" class="form-label">Número a</label>
                        <input id="a" name="a" type="number" class="form-control" value="<?php echo isset($_GET['a'])?htmlspecialchars($_GET['a']):48; ?>">
                    </div>
                    <div class="col-sm-5">
                        <label for="b" class="form-label">Número b</label>
                        <input id="b" name="b" type="number" class="form-control" value="<?php echo isset($_GET['b'])?htmlspecialchars($_GET['b']):18; ?>">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary w-100">Calcular</button>
                    </div>
                </form>

                <?php
                include 'relacion3.php';
                // Si se han enviado los números, mostramos resultados
                if (isset($_GET['a']) && isset($_GET['b'])) {
                    $a = (int) $_GET['a'];
                    $b = (int) $_GET['b'];

                    echo '<hr>';
                    echo '<h5>Resultados para a=' . htmlspecialchars($a) . ' y b=' . htmlspecialchars($b) . '</h5>';

                    // División - iterativa
                    $res1 = mcd_division_iterativa($a, $b);
                    echo '<div><strong>Euclides (división, iterativa):</strong> ' . $res1 . '</div>';

                    // División - recursiva
                    $res2 = mcd_division_recursiva($a, $b);
                    echo '<div><strong>Euclides (división, recursiva):</strong> ' . $res2 . '</div>';

                    // Sustracción - iterativa
                    $res3 = mcd_sustraccion_iterativa($a, $b);
                    echo '<div><strong>Euclides (sustracción, iterativa):</strong> ' . $res3 . '</div>';

                    // Sustracción - recursiva
                    $res4 = mcd_sustraccion_recursiva($a, $b);
                    echo '<div><strong>Euclides (sustracción, recursiva):</strong> ' . $res4 . '</div>';

                    // Nota: todos deberían coincidir si las funciones están bien
                    echo '<p class="mt-2 text-muted small">Todos los resultados deben ser iguales.</p>';
                }
                ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
