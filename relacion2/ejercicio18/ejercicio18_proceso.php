<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Binario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Resultado de la Conversión</h3>
                    </div>
                    <div class="card-body">
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $decimal = (int)($_POST['decimal'] ?? 0);

                                $binario = decbin($decimal);

                                echo "<div class='alert alert-success'>";
                                echo "<p>El número decimal <b>$decimal </b> es: </p>";
                                echo "<h3 class='text-center'>$binario</h3>";
                                echo "<p class='text-center'>(en binario)</p>";
                                echo "</div>";
                            }

                        ?>
                        <a href="ejercicio18_form.html" class="btn btn-secondary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>