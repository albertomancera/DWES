<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4">Introduce dos cadenas y te calculo la distancia Hamming entre ellas</h2>
                
            <form action="proceso.php" method="get">
                <div class="col-md-6">
                    <label for="cadena1" class="form-label">Dame una frase: </label>
                    <input type="text" class="form-control" id="cadena1" name="cadena1" required>
                </div>

                <div class="col-md-6">
                    <label for="cadena2" class="form-label">Dame una frase:</label>
                    <input type="text" class="form-control" id="cadena2" name="cadena2" required>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit">Enviar</button>
                </div>

            </form>
</body>
</html>