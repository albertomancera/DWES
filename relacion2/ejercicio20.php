<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación II - Ejercicio 20 (Calculadora)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Calculadora (Select Validado)</h3>
                    </div>
                    <div class="card-body">
                        <form action="ejercico10/10calculo.php" method="POST">
                            <div class="mb-3">
                                <label for="num1" class="form-label">Número 1</label>
                                <input type="number" class="form-control" id="num1" name="num1" required>
                            </div>
                            <div class="mb-3">
                                <label for="num2" class="form-label">Número 2</label>
                                <input type="number" class="form-control" id="num2" name="num2" required>
                            </div>
                            <div class="mb-3">
                                <label for="operador" class="form-label">Operación</label>
                                <select class="form-select" id="operacion" name="operacion" required>
                                    <option value="" disabled selected>-- Elige una operación --</option>
                                    <option value="suma">Suma (+)</option>
                                    <option value="resta">Resta (-)</option>
                                    <option value="multiplicacion">Multiplicacion (*)</option>
                                    <option value="division">Division (/)</option>
                                    <option value="modulo">Modulo (%)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Calcular</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>