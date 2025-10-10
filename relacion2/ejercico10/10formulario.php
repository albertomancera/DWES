<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Relación 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>


    </style>
</head>
<body>
    <h2 class="text-center mb-4"> Calculadora </h2>
    
    <!-- Añade un recuadro con padding y sombra-->
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 400px;">
        <form action="10calculo.php" method="get">
            <label for="num1" class="form-label"> Primer número: </label>
<!-- mb-3 deja espacio entre los inputs-->
            <input  class="form-control mb-3" type="number" name="num1" id="num1" required>

            <label for="operacion" class="form-label"> Operacion: </label>
            <select  class="form-control mb-3" name="operacion" id ="operacion" required>
                <option value="suma">Suma (+)</option>
                <option value="resta">Resta (-)</option>
                <option value="multiplicacion">Multiplicacion (*)</option>
                <option value="division">Division (/)</option>
                <option value="modulo">Modulo (%)</option>
            </select>

            <label for="num2" class="form-label"> Segundo número: </label>
            <input  class="form-control mb-3" type="number" name="num2" id="num2" required>

            <input class="btn btn-primary w-100" type="submit" value="Calcular">
        </form>
    </div>

</body>
</html>