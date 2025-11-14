<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Conversor</title>
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
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                $decimal = (int) ($_POST['decimal'] ?? 0);
                                $base = (int) ($_POST['base'] ?? 2);
                                $resultado = "";
                                $nombreBase ="";

                                $resultado = match ($base){
                                    2 => decbin($decimal),
                                    8 => decoct($decimal),
                                    16 => dechex($decimal),
                                    default => "Error"
                                };

                                $nombreBase = match ($base) {
                                2 => "Binario",
                                8 => "Octal",
                                16 => "Hexadecimal",
                                default => ""
                                };
                            
                                echo "<div class='alert alert-success'>";
                                echo "<p>El número decimal <b>$decimal</b> es:</p>";
                                echo "<h3 class='text-center text-uppercase'>$resultado</h3>";
                                echo "<p class='text-center'>($nombreBase)</p>";
                                echo "</div>";
                            }

                        ?>
                        <a href="ejercicio19_form.html" class="btn btn-secondary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>