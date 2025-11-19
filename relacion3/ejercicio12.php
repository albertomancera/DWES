<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12. Algoritmo Bubble Sorting</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>



<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-5 text-primary">12 - Algoritmo Bubble Sorting</h1>

        <?php 
        // Establece la configuración regional a español para la ordenación correcta de caracteres especiales (acentos, ñ).
        // Se intenta establecer en varios formatos para maximizar la compatibilidad entre sistemas.
        setlocale(LC_COLLATE, 'es_ES.UTF-8', 'es_ES.utf8', 'es_ES', 'Spanish_Spain.1252');

        $datos = ['Pérez','García','López','Márquez','Álvarez','Domínguez','Ruíz','Díaz'];

        /**
         * Ordena un array utilizando el algoritmo Bubble Sort.
         * Utiliza strcoll() para una comparación de cadenas que respeta la configuración regional.
         *  &$array El array a ordenar (pasado por referencia).
         */
        function bubbleSort(&$array){
            for ($i = 0; $i < count($array); $i++) {
                for ($j = 0; $j < count($array) - 1 - $i; $j++) {
                    if (strcoll($array[$j], $array[$j + 1]) > 0) {
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
        }

        // --- Primer ejemplo ---
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">';
        echo '<h2 class="card-title text-secondary mb-3">Ordenando arrays mediante Bubble Sort</h2>';

        echo '<h5 class="text-muted">Valores iniciales:</h5>';
        echo '<pre class="bg-light p-3 border rounded">' . print_r($datos, true) . '</pre>';

        bubbleSort($datos);

        echo '<h5 class="text-muted mt-3">Valores ordenados mediante Bubble Sort:</h5>';
        echo '<pre class="bg-light p-3 border rounded">' . print_r($datos, true) . '</pre>';
        echo '</div>';
        echo '</div>';

        // --- Segundo ejemplo ---
        $datosEng = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Miller', 'Davis', 'Garcia', 'Rodriguez', 'Martinez'];

        echo '<div class="card shadow-sm">';
        echo '<div class="card-body">';
        echo '<h2 class="card-title text-secondary mb-3">Ordenando arrays como cadenas (sort)</h2>';

        echo '<h5 class="text-muted">Valores iniciales:</h5>';
        echo '<pre class="bg-light p-3 border rounded">' . print_r($datosEng, true) . '</pre>';

        sort($datosEng, SORT_STRING);

        echo '<h5 class="text-muted mt-3">Valores ordenados mediante sort:</h5>';
        echo '<pre class="bg-light p-3 border rounded">' . print_r($datosEng, true) . '</pre>';
        echo '</div>';
        echo '</div>';
        
        ?>

    </div>
    
    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>