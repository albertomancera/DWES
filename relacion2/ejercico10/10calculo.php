<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend de la calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <h2 class="text-center mb-4">Resultado</h2>
    <div  class="card p-4 shadow-sm mx-auto" style="max-width: 400px;">
    <?php
        if(isset($_GET["num1"]) && isset($_GET["num2"]) && isset($_GET["operacion"])){
            $num1 = $_GET["num1"];
            $num2 = $_GET["num2"];
            $operacion = $_GET["operacion"];
            $resultado = "";
        

        switch ($operacion) {
            case "suma":
                $resultado = $num1 + $num2;
                break;
            case "resta":
                $resultado = $num1 - $num2;
                break;
            case "multiplicacion":
                $resultado = $num1 * $num2;
                break;
            case "division" :
                if($num2 !=0){
                    $resultado = $num1 / $num2;
                }else{
                    $resultado = "Error no se puede dividir entre 0";
                }
                break;
            case "modulo":
                if($num2 !=0){
                    $resultado = $num1 % $num2;
                }else{
                    $resultado = "Error no se puede USAR % con 0";
                }
                break;
            default:
                $resultado = "Operacion no valida";
                break;
        }

        echo "<p>El resultado de la operacion es: $resultado</p>";
    }else{
        echo "<p>No se han recibido todos los datos necesarios </p>";
    }
    ?>
        <br>
        <a href="10formulario.php">Volver a al calculadora</a>
    </div>

</body>
</html>