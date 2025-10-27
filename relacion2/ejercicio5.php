<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Temperaturas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container py-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="h4 mb-3">Array asociativo de temperaturas</h1>

                <?php
                
                $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
                $temps = [32, 28, 34, 23, 27, 33, 25];
                ?>

                <!-- Mostrar la temperatura del primer día -->
                <p>Temperatura del primer día de la semana: <strong><?php echo $temps[0]; ?>°C</strong></p>

                <div class="row">
                    <div class="col-md-7">
                        <h2 class="h6">Tabla</h2>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Día</th>
                                    <th>Temperatura (°C)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($dias); $i++) { ?>
                                    <tr>
                                        <td><?php echo $dias[$i]; ?></td>
                                        <td><?php echo $temps[$i]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-5">
                        <h2 class="h6">Lista (list-group)</h2>
                        <ol class="list-group list-group-numbered mb-3">
                            <?php for ($i = 0; $i < count($dias); $i++) { ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $dias[$i]; ?>
                                    <span class="badge bg-primary rounded-pill"><?php echo $temps[$i]; ?>°C</span>
                                </li>
                            <?php } ?>
                        </ol>

                        <h2 class="h6">Components de prueba</h2>
                        <div class="mb-3">
                            <!-- Botones de prueba -->
                            <button type="button" class="btn btn-primary me-2">Primario</button>
                            <button type="button" class="btn btn-outline-secondary me-2">Secundario</button>
                        </div>

                        <div class="mb-3">
                            <!-- Spinner de ejemplo -->
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                            <div class="spinner-border text-secondary ms-2" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                        </div>

                        <div>
                            <!-- Badges y otra lista pequeña -->
                            <ul class="list-group">
                                    <?php for ($i = 0; $i < count($dias); $i++) { ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?php echo $dias[$i]; ?>
                                            <span class="badge bg-info text-dark"><?php echo $temps[$i]; ?>°C</span>
                                        </li>
                                    <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Sección con la salida original (para referencia) -->
                <hr>
                <h2 class="h6">Salida original (referencia)</h2>
                <!-- Comentario HTML: la siguiente sección es generada por PHP y se puede ver en el HTML resultante -->
                <?php
                echo "<h3>Saltando de línea</h3>";
                for ($i = 0; $i < count($dias); $i++) {
                    echo $dias[$i] . " : " . $temps[$i] . "<br>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>