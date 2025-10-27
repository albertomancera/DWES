<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container py-4">
        <?php

            // Días de la semana
            const SEMANA = ['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];

        ?>

        <div class="card">
            <div class="card-body">
                <h1 class="h4 mb-3">Ejercicio 4 &middot; Días de la semana</h1>
                <p>El primer día de la semana es: <strong><?php echo SEMANA[0]; ?></strong></p>
                <p>Una semana tiene <strong><?php echo count(SEMANA); ?></strong> días</p>
                <p>Todos los días de la semana son:</p>

                <?php
                    // Usamos list-group-numbered de Bootstrap 5 para listas numeradas estilizadas
                    echo '<ol class="list-group list-group-numbered">';

                    for ($i = 0; $i < count(SEMANA); $i++) {
                        echo '<li class="list-group-item">' . SEMANA[$i] . '</li>';
                    }

                    echo '</ol>';
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>