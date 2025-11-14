<?php 
    $resultadoHtml = "";
    $num = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num = (int)($_POST['numero'] ?? 0);
            $factorial = 1;

            if($num < 0){
                $resultadoHtml = "<div class='alert alert-danger'> El número debe ser 0 o por encima de 0";
            }else{
                $calculo = "";
                if($num == 0){
                    $calculo = "0! = 1";
                }else{
                    $calculo = "$num! = ";
                    for ($i = $num; $i >=1 ; $i--){
                        $factorial *= $i;
                        $calculo .= $i . ($i > 1 ? "*" : "");
                    }
                }

                $resultadoHtml = "<div class='alert alert-success'>";
                $resultadoHtml .= "<p>$calculo</p>";
                $resultadoHtml .= "<h4>Resultado: $factorial</h4>";
                $resultadoHtml .= "</div>";
        }
    };
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación II - Ejercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Cálculo de Factorial (Ej 13, R.I)</h3>
                    </div>
                    <div class="card-body">
                        <div id="error-container" class="alert alert-danger" style="display: none;"></div>
                        
                        <form id="form-factorial" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="numero" class="form-label">Número (Entero y positivo)</label>
                                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $num; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Calcular Factorial</button>
                        </form>

                        <div class="mt-4">
                            <?php echo $resultadoHtml; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("form-factorial").addEventListener("submit", function(event){
            const numero = document.getElementById("numero");
            const errorContainer = document.getElementById("error-container");
            const valor = numero.value.trim();

            let errores = [];

            if(valor == ""){
                errores.push("El número no puede estar vacío");
            }else if (isNaN(valor)){
                errores.push("El valor debe ser númerico");
            }else if(!Number.isInteger(parseFloat(valor))){
                errores.push("La nota debe de ser un número entero");
            }else if(parseInt(valor) < 0){
                errores.push("El número no puede ser negativo");
            }

            if (errores.length > 0) {
                event.preventDefault();
                errorContainer.innerHTML = errores.join("<br>");
                errorContainer.style.display = "block";
                numero.classList.add("is-invalid");
            } else {
                errorContainer.style.display = "none";
                numero.classList.remove("is-invalid");
            }

    });       
    </script>
</body>
</html>