<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8. Formularios texto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Bootstrap Templates/src/styles/formStyle.css">
</head>

<body>

    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
        <button class="btn btn-success" onclick="formLowerUpper()">Formulario Mayus & Minus</button>
        <button class="btn btn-primary" onclick="formLowerOrUpper()">Formulario Mayus || Minus</button>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center mt-5">

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
              method="get"
              class="border border-0 rounded-4 shadow-lg p-4 bg-secondary bg-opacity-25"
              id="form1">

            <h1 class="mb-4 text-center text-primary fw-bold">Texto Mayus/Minus</h1>

            <input type="hidden" name="tipo" id="tipo" value="">

            <div class="mb-3">
                <label for="texto" class="form-label">Introduzca un texto</label>
                <input class="form-control bg-secondary bg-opacity-25" type="text" name="texto" id="texto">
            </div>

            <!-- BOTONES FORM1 -->
            <div id="mayusMinus" hidden>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-outline-secondary" type="reset">Borrar</button>
                </div>
            </div>

            <!-- CHECKBOX FORM2 -->
            <div id="checkbox1" hidden>
                <div class="mb-3">
                    <p class="form-label">Indique la opción a ejecutar:</p>

                    <div class="form-check">
                        <input class="form-check-input bg-secondary bg-opacity-25"
                               type="checkbox"
                               name="check1"
                               id="check1"
                               value="mayus">
                        <label class="form-check-label" for="check1">Texto a mayúsculas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input bg-secondary bg-opacity-25"
                               type="checkbox"
                               name="check2"
                               id="check2"
                               value="minus">
                        <label class="form-check-label" for="check2">Texto a minúsculas</label>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-outline-secondary" type="reset">Borrar</button>
                </div>
            </div>

        </form>

        <!-- RESULTADO -->
        <div class="result-area text-center mt-3 w-100">

            <?php
            function textoLower($t) {
                echo "<p>El texto <b>$t</b> en minúsculas es: <b>" . strtolower($t) . "</b></p>";
            }

            function textoUpper($t) {
                echo "<p>El texto <b>$t</b> en mayúsculas es: <b>" . strtoupper($t) . "</b></p>";
            }

            if (!empty($_GET['tipo']) && isset($_GET['texto'])) {

                $texto = htmlspecialchars($_GET['texto']);

                if ($_GET['tipo'] == 'form1') {
                    textoUpper($texto);
                    textoLower($texto);

                } elseif ($_GET['tipo'] == 'form2') {

                    $mayus = isset($_GET['check1']);
                    $minus = isset($_GET['check2']);

                    if ($mayus) textoUpper($texto);
                    if ($minus) textoLower($texto);

                    if (!$mayus && !$minus) {
                        echo "<p>No se ha seleccionado ninguna opción.</p>";
                    }
                }
            }
            ?>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./main.js"></script>

</body>
</html>
