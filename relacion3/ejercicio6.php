<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5. Tiradas de un dado</title>
    <!-- Bootstrap para estilos básicos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <!-- Estilos extra (opcional, se mantiene como estaba) -->
    <link rel="stylesheet" href="../Bootstrap Templates/src/styles/formStyle.css" />
</head>

<body>
    <!-- Contenedor centrado verticalmente con vh-100 -->
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <!-- Formulario: envía el número de tiradas por GET al mismo script -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="border border-0 rounded-4 shadow-lg p-4 bg-secondary bg-opacity-25" id="form1">
            <h1 class="mb-4 text-center text-primary fw-bold">5- Tiradas de un dado (Clase Math)</h1>

            <!-- Entrada: número entero de tiradas -->
            <div class="mb-3">
                <label for="num" class="form-label">Introduzca un nº entero:</label>
                <input type="number" name="num" id="num" class="form-control rounded-3 bg-secondary bg-opacity-25 border">
            </div>

            <!-- Botón de envío -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-success me-md-2" type="submit">Enviar</button>
            </div>
        </form>

        <?php
        // Bloque PHP: si se envió el parámetro 'num' por GET, realizamos la simulación
        if (isset($_GET['num'])) {
            // Aseguramos que sea un entero
            $tiradas = intval($_GET['num']);

            // Mensaje introductorio con número de tiradas
            echo "<br><h3 class='text-primary'>Tiramos el dado $tiradas veces:</h3>";

            // Contenedor para los resultados (estético)
            echo "<div class='d-flex flex-row justify-content-center align-items-center mt-4'>";

            // Inicializamos dos arrays con claves 1..6 y valores 0
            // $dadoNormal cuenta las apariciones en el dado justo
            // $dadoTrucado cuenta las apariciones en el dado trucado
            $dadoNormal = array_fill(1, 6, 0);
            $dadoTrucado = array_fill(1, 6, 0);

            // Bucle principal: simulamos 'tiradas' veces
            for ($i = 0; $i < $tiradas; $i++) {
                // Tirada del dado justo: valor entre 1 y 6 (equiprobable)
                $tirada = rand(1, 6);

                // Tirada del dado trucado: generamos 1..8 y mapeamos
                // 1..5 -> cara 1..5 (cada una con prob 1/8), 6..8 -> cara 6 (prob 3/8)
                $tiradaTrucada = rand(1, 8);

                // El código original usaba switch para incrementar la cara obtenida.
                // Aquí se mantiene el switch por claridad didáctica: cada case incrementa el contador
                switch ($tirada) {
                    case 1:
                        $dadoNormal[$tirada]++;
                        break;
                    case 2:
                        $dadoNormal[$tirada]++;
                        break;
                    case 3:
                        $dadoNormal[$tirada]++;
                        break;
                    case 4:
                        $dadoNormal[$tirada]++;
                        break;
                    case 5:
                        $dadoNormal[$tirada]++;
                        break;
                    case 6:
                        $dadoNormal[$tirada]++;
                        break;
                }

                // Para el dado trucado: si el valor generado es menor que 6 (1..5)
                // lo contamos en la misma cara; si es 6..8, lo tratamos como cara 6
                if ($tiradaTrucada < 6) {
                    $dadoTrucado[$tiradaTrucada]++;
                } else {
                    // 6..8 se consideran como cara 6 (mayor probabilidad)
                    $dadoTrucado[6]++;
                }
            }

            // Mostramos resultados: primero el dado equiprobable
            echo "<div class='text-center me-5'>";
            echo "<p class='mt-2'>Tiradas con dado equiprobable:</p>";
            echo "<ul>";

            // Cada elemento de $dadoNormal es el número de veces que salió esa cara
            // Convertimos a porcentaje relativo al total de tiradas
            foreach ($dadoNormal as $index => $porcentaje) {
                // number_format formatea la cifra con 2 decimales
                echo "<li>Tirada $index: " . number_format((($porcentaje / $tiradas) * 100), 2) . "%</li>";
            }

            echo "</ul>";
            echo "</div>";

            // Ahora mostramos los resultados del dado trucado
            echo "<div class='text-center'>";
            echo "<p class='mt-2'>Tiradas con dado trucado:</p>";
            echo "<ul>";

            // Igual que antes, pero con los contadores del dado trucado
            foreach ($dadoTrucado as $index => $porcentajeTrucado) {
                echo "<li>Tirada $index: " . number_format((($porcentajeTrucado / $tiradas) * 100), 2) . "%</li>";
            }

            echo "</ul></div>";
            echo "</div>"; // cierre del contenedor de resultados
        }
        ?>

    </div>
</body>
</html>