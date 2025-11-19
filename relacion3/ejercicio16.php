<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>16. Funciones Callback</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5 text-primary">16 - Funciones callback</h1>
        <div class="card mb-4 shadow-sm"> <?php
        // Ejemplo sobre callbacks y funciones de orden superior en arrays:
        // - array_filter con una función de prueba (esPrimo)
        // - array_map para transformar (cuadrado)
        // - array_walk para modificar in-place
        $array = range(1, 100);
        
        // --- DEFINICIÓN DE FUNCIONES (CALLBACKS) ---

        // Las siguientes funciones se han creado para ser usadas como "callbacks"
        // o para demostrar lógica de iteración sobre arrays.

        // Comprueba que todos los elementos son positivos
        function todosPos($array)
        {
            $esPos = true;
            foreach ($array as $value) {
                if ($value < 0) {
                    $esPos = false;
                    break;
                }
            }
            return $esPos;
        }

        // Comprueba si existe al menos un múltiplo de 5
        function existeMultiplo5($array)
        {
            $existe = false;
            foreach ($array as $value) {
                if ($value % 5 == 0) {
                    $existe = true;
                    break;
                }
            }
            return $existe;
        }

        /**
         * Determina si un número es primo.
         * Esta es una versión corregida y optimizada.
         */
        function esPrimo($num)
        {
            if ($num < 2) return false; // 1 y los negativos no son primos.
            // Se comprueba solo hasta la raíz cuadrada del número por eficiencia.
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) return false; // Si es divisible, no es primo.
            }
            return true; // Si el bucle termina, es primo.
        }

        // Busca la primera ocurrencia de un número cuyas dos primeras cifras coinciden
        function cifrasIguales($array)
        {
            $resultado = null;
            foreach ($array as $value) {
                $textoValor = strval($value);
                if (strlen($textoValor) > 1) {
                    if ($textoValor[0] == $textoValor[1]) {
                        $resultado = $textoValor;
                        break;
                    }
                }
            }
            return $resultado;
        }

        function cuadrado($num)
        {
            return $num ** 2;
        }

        // --- EJECUCIÓN Y USO DE CALLBACKS ---

        // 1. Llamadas directas a funciones que iteran internamente
        $esPos = todosPos($array);
        $existe = existeMultiplo5($array);
        $cifrasIguales = cifrasIguales($array);

        // --- MUESTRA DE RESULTADOS ---
        echo '<div class="card mb-4 shadow-sm">'; // Tarjeta para el array inicial
        echo '<div class="card-body">';
        echo '<h2 class="card-title text-secondary mb-3">Valores iniciales del array</h2>';
        foreach ($array as $value) {
            echo " $value ";
        }
        echo "</div></div>";
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">'; // Tarjeta para todosPos
        echo '<h2 class="card-title text-secondary mb-3">¿Son los elementos del array todos positivos?</h2>';
        if ($esPos) {
            echo '<div class="alert alert-success mt-2">Los elementos del array son positivos</div>';
        } else {
            echo '<div class="alert alert-danger mt-2">No todos los elementos del array son positivos</div>';
        }
        echo "</div></div>";
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">'; // Tarjeta para existeMultiplo5
        echo '<h2 class="card-title text-secondary mb-3">¿Existe en el array algún múltiplo de 5?</h2>';
        if ($existe) {
            echo '<div class="alert alert-info mt-2">En el array existe al menos un elemento múltiplo de 5</div>';
        } else {
            echo '<div class="alert alert-warning mt-2">En el array no existe ningún elemento múltiplo de 5</div>';
        }
        echo "</div></div>";

        // 2. Uso de array_filter con el callback "esPrimo"
        $numPrimos = array_filter($array, "esPrimo");
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">'; // Tarjeta para los números primos
        echo '<h2 class="card-title text-secondary mb-3">Mostrando valores primos del array</h2>';
        // implode une los elementos de un array con un "pegamento", en este caso ", ".
        echo '<p class="font-monospace">' . implode(', ', $numPrimos) . '</p>';
        echo "</div></div>";

        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">'; // Tarjeta para cifrasIguales
        echo '<h2 class="card-title text-secondary mb-3">Mostrando la primera ocurrencia de un número cuyas 2 cifras son idénticas</h2>';
        echo '<div class="alert alert-primary mt-2">La primera ocurrencia de un número con 2 cifras iguales es ' . $cifrasIguales . '</div>';
        echo "</div></div>";

        // 3. Uso de array_map con el callback "cuadrado"
        $cuadrados = array_map("cuadrado", $array);
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">'; // Tarjeta para los cuadrados
        echo '<h2 class="card-title text-secondary mb-3">Mostrando el cuadrado de cada valor del array</h2>';
        echo '<p class="font-monospace" style="word-break: break-all;">' . implode(', ', $cuadrados) . '</p>';
        echo "</div></div>";

        // 4. Uso de array_walk para modificar el array original
        // Se usa una función flecha como callback. La '&' modifica el array original.
        array_walk($array, fn(&$n) => $n *= 2);
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">'; // Tarjeta para el array modificado
        echo '<h2 class="card-title text-secondary mb-3">Mostrando el doble de cada valor del array</h2>';
        echo '<p class="font-monospace">' . implode(', ', $array) . '</p>';
        echo "</div></div>";
        ?>
    </div>
</body>
</html>