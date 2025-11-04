<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13 - Validacion con Vanilla JavaScript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-text{
            visibility: hidden;
        }
    </style>

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

                <!-- Formulario sin 'required' ni min/max, la validación será por JS -->
                <form  id="formulario" action="calculo.php" method="post" onsubmit="return validarForm()">
                    <div class="row g-3">
                    <!-- Fila con separación entre columnas -->

                    <!-- Campo: Nombre -->
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                        <div id="nombreHelp" class="form-text text-danger">El nombre es obligatorio </div>
                    <!-- required: campo obligatorio -->
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <div id="emailHelp" class="form-text text-danger" >El email no tiene formato correcto</div>     
                    </div>

                    <hr class="my-4">

                    <h5 class="text-center">Introduce tus calificaciones</h5>
                
                    <!-- Campo: Primera evaluación -->
                    <div class="col-md-3">
                        <label for="primera" class="form-label">Primera</label>
                        <input type="number" class="form-control" name="primera" id="primera">
                        <div id="primeraHelp" class="form-text text-danger" >La nota es obligatoria y debe ser del 1 al 10</div>
                    </div>
                    
                    <!-- Campo: Segunda evaluación -->
                    <div class="col-md-3">
                        <label for="segunda" class="form-label">Segunda</label>
                        <input type="number" class="form-control" name="segunda" id="segunda" >
                        <div id="segundaHelp" class="form-text text-danger">La nota es obligatoria y debe ser del 1 al 10</div>
                    </div>

                    <!-- Campo: Tercera evaluación -->
                    <div class="mb-3">
                        <label for="faltas" class="form-label">Introduce faltas:<span class="text-danger"> *</span></label>
                        <input type="text" placeholder="un número entero de 0 en adelante" class="form-control" name="faltas" id="faltas">
                        <div id="faltasHelp" class="form-text text-danger">La faltas son obligatorias y deben ser enteras entre 0 y 10</div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-success" value="Enviar" id="boton" >Calcular Nota</button>
                    </div>
                </div>
                </form>

                <hr class="my-4">

                <script src="validacion.js"></script>
            </div>
        </div>
    </div>
</body>
</html>