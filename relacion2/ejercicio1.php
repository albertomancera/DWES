<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container p-5">
    <form action="" id="form-calc" method="post">
        <h1 class="card-title text-center mb-4">Calculadora en PHP</h1>
        <div class="mb-3">
            <label for="num1" class="form-label">Dame un número</label>
            <input type="number" class="form-control" id="num1" name="num1" required>
        </div>
        <select class="form-select" id="operacion" name="operacion" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>
        <div class="mb-3">
            <label for="num2" class="form-label">Dame un número</label>
            <input type="number" class="form-control" id="num2" name="num2" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <?php
        //Solo se ejecuta si se envió el formulario(método POST)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operacion = $_POST['operacion'];

            $resultado = null;
            if($operacion == '+'){
                $resultado = $num1 + $num2;
            }elseif($operacion == '-'){
                $resultado = $num1 - $num2;
            }elseif($operacion == '*'){
                $resultado = $num1 * $num2;
            }elseif($operacion == '/'){
                if($num2 == 0){
                    echo "<p>Error: No se puede dividir por cero </p>";
                    exit;
                }
                $resultado = $num1 / $num2;
            }elseif($operacion =='%'){
                if($num2 == 0){
                    echo "<p>Error: No se puede calcular el modulo con cero</p>";
                    exit;
                }
                $resultado = $num1 % $num2;
            }else{
                echo "<p>Operación no valida</p>";
                exit;
            }

            echo "<p>$num1 $operacion $num2 = $resultado</p>";

        }

    ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>