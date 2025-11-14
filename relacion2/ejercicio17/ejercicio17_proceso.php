<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado División</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Resultado</h3>
                    </div>
                    <div class="card-body">
                        <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                $dividendo = (int)($_POST['dividendo'] ?? 0);
                                $divisor = (int)($_POST['divisor'] ?? 0);

                                $opciones = $_POST['opciones'] ?? [];

                                echo "<div class='alert alert-info'>";
                                echo "<h4>Dividendo: $dividendo, Divisor: $divisor</h4><hr>";

                                if($divisor == 0){
                                    echo "<p class='text-danger'>Error: No se puede dividir por cero </p>";
                                }else{
                                    $cociente = 0;
                                    $resto = $dividendo;
                                    while ($resto >= $divisor){
                                        $resto -= $divisor;
                                        $cociente++;
                                    }
                                

                                    if(in_array("cociente", $opciones)){
                                        echo "<p><b>Cociente:</b> $cociente </p>";
                                    }
                                    if(in_array("resto", $opciones)){
                                        echo "<p><b>Resto:</b> $resto </p>";
                                    }
                                }
                                echo "</div>";
                            }else{
                                echo "<div class='alert alert-warning'>Acceso no permitido </div>";
                            }

                        ?>

                        <a href="ejercicio17_form.html" class="btn btn-secondary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>