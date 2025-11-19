<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17. Funciones Array</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5 text-primary">17- Funciones Array</h1>

        <?php
        /**
         * -----------------------------------------------------------------
         * FASE 1: DEFINICIÓN DE FUNCIONES AUXILIARES (CALLBACKS)
         * -----------------------------------------------------------------
         * Estas funciones se usarán con array_filter. Es buena práctica
         * que devuelvan un booleano (true/false) explícito.
         */
        function esImpar($num)
        {
            return $num % 2 != 0;
        }

        function esMultiploDe3($num)
        {
            return $num % 3 == 0;
        }

        function esMayorQue10($num)
        {
            return $num >= 10;
        }

        /**
         * -----------------------------------------------------------------
         * FASE 2: LÓGICA Y CÁLCULOS
         * -----------------------------------------------------------------
         * Realizamos todas las operaciones y guardamos los resultados en variables.
         * No se genera ningún HTML en esta sección.
         */

        // --- Datos Iniciales ---
        $arrayBase = range(1, 20);
        $arrayImpares = array_filter($arrayBase, "esImpar");
        $arrayMultiplos3 = array_filter($arrayBase, "esMultiploDe3");

        // --- Combinación y Análisis Básico ---
        $arrayCombinado = array_merge($arrayImpares, $arrayMultiplos3);
        sort($arrayCombinado); // Ordena el array combinado
        $repeticiones = array_count_values($arrayCombinado);
        $elementosUnicos = array_unique($arrayCombinado);
        $elementosComunes = array_intersect($arrayImpares, $arrayMultiplos3);

        // --- Diferencias ---
        $diffSimple = array_diff($arrayImpares, $arrayMultiplos3);
        $diffAsociativo = array_diff_assoc($arrayImpares, $arrayMultiplos3);
        $diffPorClave = array_diff_key($arrayImpares, $arrayMultiplos3);

        // --- Transformaciones y Obtención de Datos ---
        $primerElemento = $arrayCombinado[0];
        $ultimoElemento = $arrayCombinado[count($arrayCombinado) - 1];
        $arrayInvertidoClaveValor = array_flip($arrayCombinado);
        $valoresDelArray = array_values($arrayCombinado);
        $arrayRevertido = array_reverse($arrayCombinado);
        $primeros5 = array_slice($arrayCombinado, 0, 5);
        $ultimos5 = array_slice($arrayCombinado, -5);
        $filtradosMayores10 = array_filter($arrayCombinado, "esMayorQue10");

        // --- Búsqueda ---
        $numAleatorio = rand(1, 20);
        $posicionNumAleatorio = array_search($numAleatorio, $arrayCombinado);

        // --- Ordenaciones (se hacen sobre copias para no alterar el original) ---
        $ordenadoInversoValor = $arrayCombinado;
        rsort($ordenadoInversoValor); // Ordena de mayor a menor, resetea claves

        $ordenadoInversoValorConClaves = $arrayCombinado;
        arsort($ordenadoInversoValorConClaves); // Ordena de mayor a menor, mantiene claves

        $arrayMezclado = $arrayCombinado;
        shuffle($arrayMezclado); // Desordena aleatoriamente

        // --- Modificación de Arrays (se hacen sobre copias) ---
        $arrayParaPop = $arrayCombinado;
        array_pop($arrayParaPop); // Extrae el último elemento

        $arrayParaPush = $arrayCombinado;
        array_push($arrayParaPush, 30); // Añade un elemento al final

        $arrayParaSplice = $arrayCombinado;
        $elementosReemplazados = array_splice($arrayParaSplice, 0, count($arrayParaSplice), "Elemento reemplazado");

        // --- Creación de Arrays ---
        $texto1 = "Hola";
        $texto2 = "que";
        $texto3 = "tal";
        $arrayDesdeVariables = compact("texto1", "texto2", "texto3");

        /**
         * -----------------------------------------------------------------
         * FASE 3: PRESENTACIÓN (HTML)
         * -----------------------------------------------------------------
         * Usamos las variables calculadas en la FASE 2 para generar la vista.
         */
        ?>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-secondary mb-3">Demostración de Funciones de Array</h2>

                <!-- Arrays Iniciales -->
                <h5>Arrays iniciales</h5>
                <p><strong>Array de Impares:</strong> <?= implode(', ', $arrayImpares) ?></p>
                <p><strong>Array de Múltiplos de 3:</strong> <?= implode(', ', $arrayMultiplos3) ?></p>
                <hr>

                <!-- Demostraciones -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Array Combinado y Ordenado (<code>array_merge</code>, <code>sort</code>):</strong><br><?= implode(', ', $arrayCombinado) ?></li>
                    
                    <li class="list-group-item"><strong>Conteo de valores (<code>array_count_values</code>):</strong>
                        <table class="table table-sm table-bordered mt-2" style="max-width: 200px;">
                            <thead><tr><th>Número</th><th>Repeticiones</th></tr></thead>
                            <tbody>
                                <?php foreach ($repeticiones as $num => $veces): ?>
                                    <tr><td><?= $num ?></td><td><?= $veces ?></td></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </li>

                    <li class="list-group-item"><strong>Diferencias (<code>array_diff</code>):</strong><br>Elementos en Impares que no están en Múltiplos de 3: <?= implode(', ', $diffSimple) ?></li>
                    <li class="list-group-item"><strong>Intersección (<code>array_intersect</code>):</strong><br>Elementos comunes a ambos arrays: <?= implode(', ', $elementosComunes) ?></li>
                    <li class="list-group-item"><strong>Valores únicos (<code>array_unique</code>):</strong><br>El array combinado sin duplicados: <?= implode(', ', $elementosUnicos) ?></li>
                    <li class="list-group-item"><strong>Primer y último elemento:</strong><br>Primero: <?= $primerElemento ?>, Último: <?= $ultimoElemento ?></li>
                    <li class="list-group-item"><strong>Invertir Clave/Valor (<code>array_flip</code>):</strong><br><small>Útil para búsquedas rápidas por valor. Solo se muestra el principio.</small><br><pre><?= print_r(array_slice($arrayInvertidoClaveValor, 0, 5), true) ?></pre></li>
                    <li class="list-group-item"><strong>Orden inverso (<code>rsort</code>):</strong><br><?= implode(', ', $ordenadoInversoValor) ?></li>
                    <li class="list-group-item"><strong>Orden aleatorio (<code>shuffle</code>):</strong><br><?= implode(', ', $arrayMezclado) ?></li>
                    <li class="list-group-item"><strong>Búsqueda (<code>array_search</code>) de un número aleatorio (<?= $numAleatorio ?>):</strong><br>
                        <?php if ($posicionNumAleatorio !== false): ?>
                            El número <?= $numAleatorio ?> se encuentra en la posición de clave: <?= $posicionNumAleatorio ?>.
                        <?php else: ?>
                            El número <?= $numAleatorio ?> no está en el array combinado.
                        <?php endif; ?>
                    </li>
                    <li class="list-group-item"><strong>Segmento de array (<code>array_slice</code>):</strong><br>
                        Primeros 5: <?= implode(', ', $primeros5) ?><br>
                        Últimos 5: <?= implode(', ', $ultimos5) ?>
                    </li>
                    <li class="list-group-item"><strong>Extraer último elemento (<code>array_pop</code>):</strong><br>Array resultante: <?= implode(', ', $arrayParaPop) ?></li>
                    <li class="list-group-item"><strong>Añadir elemento al final (<code>array_push</code>):</strong><br>Array resultante: <?= implode(', ', $arrayParaPush) ?></li>
                    <li class="list-group-item"><strong>Reemplazar contenido (<code>array_splice</code>):</strong><br>Array resultante: <?= implode(', ', $arrayParaSplice) ?></li>
                    <li class="list-group-item"><strong>Crear array desde variables (<code>compact</code>):</strong><br><?= implode(' - ', $arrayDesdeVariables) ?></li>
                    <li class="list-group-item"><strong>Comprobar si un valor existe (<code>in_array</code>):</strong><br>
                        <?php if (in_array($numAleatorio, $arrayCombinado)): ?>
                            El número aleatorio <?= $numAleatorio ?> SÍ pertenece al array combinado.
                        <?php else: ?>
                            El número aleatorio <?= $numAleatorio ?> NO pertenece al array combinado.
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        ?>
    </div>
</body>
</html>