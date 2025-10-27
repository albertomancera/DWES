<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Formulario de 2 números</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container py-4">
        <?php
        // Procesamiento del formulario: comprobar si hay datos via POST
        $resultado = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Comprobamos que existan y no estén vacíos
            if (isset($_POST['n1']) && isset($_POST['n2']) && $_POST['n1'] !== '' && $_POST['n2'] !== '') {
                // Convertimos a float para aceptar decimales
                $n1 = (float) $_POST['n1'];
                $n2 = (float) $_POST['n2'];

                // Operaciones básicas
                $suma = $n1 + $n2;
                $resta = $n1 - $n2;
                $producto = $n1 * $n2;
                $division = null;
                if ($n2 != 0) {
                    $division = $n1 / $n2;
                }

                $resultado = [
                    'n1' => $n1,
                    'n2' => $n2,
                    'suma' => $suma,
                    'resta' => $resta,
                    'producto' => $producto,
                    'division' => $division
                ];
            } else {
                $error = 'Por favor, introduce ambos números.';
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="h5">Introduce 2 números</h1>
                        <p class="text-muted small">Formulario simple con Bootstrap 5. Introduce dos números y pulsa Enviar.</p>

                        <?php if ($error) : ?>
                            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="n1" class="form-label">Número 1</label>
                                <input type="number" step="any" class="form-control" id="n1" name="n1" value="<?php echo isset($_POST['n1']) ? $_POST['n1'] : ''; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="n2" class="form-label">Número 2</label>
                                <input type="number" step="any" class="form-control" id="n2" name="n2" value="<?php echo isset($_POST['n2']) ? $_POST['n2'] : ''; ?>" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                                <button type="reset" class="btn btn-outline-secondary">Limpiar</button>
                            </div>
                        </form>

                        <?php if ($resultado !== null) : ?>
                            <hr>
                            <h2 class="h6">Resultado</h2>
                            <ul class="list-group">
                                <li class="list-group-item"><?php echo $resultado['n1']; ?> + <?php echo $resultado['n2']; ?> = <strong><?php echo $resultado['suma']; ?></strong></li>
                                <li class="list-group-item"><?php echo $resultado['n1']; ?> - <?php echo $resultado['n2']; ?> = <strong><?php echo $resultado['resta']; ?></strong></li>
                                <li class="list-group-item"><?php echo $resultado['n1']; ?> * <?php echo $resultado['n2']; ?> = <strong><?php echo $resultado['producto']; ?></strong></li>
                                <li class="list-group-item"><?php echo $resultado['n1']; ?> / <?php echo $resultado['n2']; ?> = <strong><?php echo $resultado['division'] !== null ? $resultado['division'] : 'No se puede (división por 0)'; ?></strong></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>