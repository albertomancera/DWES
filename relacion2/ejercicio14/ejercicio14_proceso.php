<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Calificación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Calificación Obtenida</h3>
                    </div>
                    <div class="card-body">
                        <?php 
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                $nota = (int)($_POST['nota'] ?? 0);
                                $calificacion ="";

                                switch ($nota){
                                    case 1:
                                    case 2:
                                    case 3:
                                    case 4:
                                        $calificacion = "Suspenso";
                                        $colorBarra = "bg-danger";
                                        break;
                                    case 5:
                                        $calificacion = "Suficiente";
                                        $colorBarra = "bg-warning";
                                        break;
                                    case 6:
                                        $calificacion = "Bien";
                                        $colorBarra = "bg-info";
                                        break;
                                    case 7:
                                    case 8:
                                        $calificacion = "Notable";
                                        $colorBarra = "bg-primary";
                                        break;
                                    case 9:
                                    case 10:
                                        $calificacion = "Sobresaliente";
                                        $colorBarra = "bg-success";
                                        break;
                                    default:
                                    $calificacion = "Nota no valida";
                                    $colorBarra = "bg-secondary";
                                }

                                $porcentaje = $nota * 10;

                                echo "<h4>Nota: $nota </h4>";
                                echo "<h4>Calificación: $calificacion</h4>";
                                echo "<hr>";
                                
                                // --- SALIDA GRÁFICA: PROGRESS BAR (Punto de Interés) ---
                                echo "<p>Salida Gráfica:</p>";
                                echo "<div class='progress' style='height: 25px;'>";
                                echo "  <div class='progress-bar $colorBarra' 
                                        role='progressbar' 
                                        style='width: $porcentaje%;' 
                                        aria-valuenow='$nota' 
                                        aria-valuemin='0' 
                                        aria-valuemax='10'>";
                                echo "    $nota / 10";
                                echo "  </div>";
                                echo "</div>";

                        } else {
                            echo "<div class='alert alert-warning'>Acceso no permitido.</div>";
                        };
                        
                        ?>
                        <a href="ejercicio14_form.html" class="btn btn-secondary mt-4">Volver</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>