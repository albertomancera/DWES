<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12 - Cálculo de nota con rúbrica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <!--  Fondo gris claro -->

    <div class="container mt-5">
        <!-- Contenedor central con margen superior -->
        <div class="card shadow-sm">
            <!-- Tarjeta de Boostrap con una sombra suave -->
            <div class="card-body">
                <!-- Cuerpo de la tarjeta -->
                <h2 class="text-center text-primary mb-4">Calculo de Nota Final con Rúbrica</h2>

                <!-- 'required', 'min', 'max' hacen la validación HTML -->
                <form method="post" class="needs-validation" >
                    <div class="row g-3">
                    <!-- Fila con separación entre columnas -->

                    <!-- Campo: Nombre -->
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    <!-- required: campo obligatorio -->
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    <!-- type="email" valida formato de correo -->     
                    </div>

                    <hr class="my-4">

                    <h5 class="text-center">Introduce tus calificaciones</h5>
                    
                    <!-- Campo: Nota inicial -->
                    <div class="col-md-3">
                        <label class="form-label">Inicial</label>
                        <input type="number" class="form-control" name="inicial" min="0" max="10" step="0.1" required>
                    <!-- min/max/step limitan los valores -->
                    </div>

                    <!-- Campo: Primera evaluación -->
                    <div class="col-md-3">
                        <label class="form-label">Primera</label>
                        <input type="number" class="form-control" name="primera" min="0" max="10" step="0.1" required>
                    </div>
                    
                    <!-- Campo: Segunda evaluación -->
                    <div class="col-md-3">
                        <label class="form-label">Segunda</label>
                        <input type="number" class="form-control" name="segunda" min="0" max="10" step="0.1" required>
                    </div>

                    <!-- Campo: Tercera evaluación -->
                    <div class="col-md-3">
                        <label class="form-label">Tercera</label>
                        <input type="number" class="form-control" name="tercera" min="0" max="10" step="0.1" required>
                    </div>

                    <!-- Botón de envío -->
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-success">Calcular Nota</button>
                    </div>
                </div>
                </form>

                <hr class="my-4">

                <?php
                  // Solo ejecuta el cálculo si el formulario fue enviado
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $rubrica = [
                            "inicial" => 0.20,
                            "primera" => 0.30,
                            "segunda" => 0.20,
                            "tercera" => 0.30
                        ];

                        $calificaciones = [
                            "inicial" => floatval($_POST["inicial"]),
                            "primera" => floatval($_POST["primera"]),
                            "segunda" => floatval($_POST["segunda"]),
                            "tercera" => floatval($_POST["tercera"]),
            
                        ];

                        $notaFinal = 0;
                        // Recorre la rúbrica y calcula la nota ponderada
                        foreach($rubrica as $prueba => $peso){
                            $notaFinal += $peso * $calificaciones[$prueba];
                        }

                        $nombre = htmlspecialchars($_POST["nombre"]);
                        $email = htmlspecialchars($_POST["email"]);

                        if($notaFinal >= 5){
                            echo "<div class='alert alert-success text-center'>
                                    <h4>Enhorabuena, $nombre </h4>
                                    Has aprobado con un <strong>" . round($notaFinal, 2) . "</strong><br>
                                    Se enviará el resultado a: <b>$email</b>
                                </div>";
                        }else{
                            echo "<div class='alert alert-danger text-center'>
                                <h4>$nombre, estás suspenso </h4>
                                Tu nota final es <strong>" . round($notaFinal, 2) . "</strong><br>
                                Se notificará a: <b>$email</b>
                                </div>";

                        }

                    };
                ?>
            </div>
        </div>
    </div>


</body>
</html>