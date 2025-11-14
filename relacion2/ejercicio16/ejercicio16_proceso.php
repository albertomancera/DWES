<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Comprobador</title>
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
                        //Comprobamos si la petición llegó por POST
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                //$_POST lo coge del num del formulario, ?? 0, si no existe usa 0
                                $numero = (int)($_POST['numero'] ?? 0);
                                $opcion = $_POST['opcion'] ?? '';

                                echo "<div class='alert alert-info'>";

                                switch($opcion){
                                    case 'primo':
                                        echo "<h4>¿Es $numero primo?</h4>";
                                        $esPrimo = true; //variable que asumimos verdadera hasta demostrar lo contrario.
                                    
                                        /*Recorrido desde 2 hasta sqrt($numero) para comprobar factores.
                                        Llegar solo hasta la raíz cuadrada es una optimización clásica: si no hay divisores menores o iguales a la raíz, no habrá divisores mayores complementarios.*/
                                        for($i = 2; $i <= sqrt($numero); $i++){
                                           //si el número es divisible por i entonces no es primo y rompemos el bucle.
                                            if($numero % $i == 0){
                                                $esPrimo = false;
                                                break;
                                            }
                                        }

                                        echo $esPrimo ? "<p>Si, es primo </p>" : "<p>No es primo </p>";
                                        break;

                                    case 'divisores':
                                        echo "<h4>Divisores de $numero:</h4>";
                                        $listaDivisores = [];

                                        //Recorre de 1 a $numero y añade a la lista los i que dividen exactamente (% es módulo).
                                        for ($i = 1; $i <= $numero; $i++){
                                            if($numero % $i == 0){
                                                $listaDivisores[] = $i;
                                            }
                                        }

                                        echo "<p>" . implode(", ", $listaDivisores) . "</p>";
                                    break;
                                
                                default:
                                    echo "<p class='text-danger'>Opción no válida.</p>";
                                }

                                echo "</div>";

                            }else{
                                echo "<div class='alert alert-warning'>Acceso no permitido.</div>";
                            }
                        ?>
                        <a href="ejercicio16_form.html" class="btn btn-secondary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>