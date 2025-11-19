<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>19. Menu imagenes</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body class="bg-light">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center mb-5 text-primary">19- Menú con imágenes de restaurante</h1>
        <form class="form" action=<?php echo $_SERVER['PHP_SELF']; ?> method="get">
            <label for="numSuge">Introduzca el nº de sugerencias de menú:</label> <br>
            <input type="number" name="numSuge" id="numSuge" required>
            <button type="submit" class="btn btn-primary rounded-2">Generar sugerencias</button>
        </form> <br><br>
        <?php
        function generarMenus($n, $menu, $imagenes)
        {

            echo '<div class="container mt-4">';
            echo '<h2 class="text-secondary mb-4 text-center">Sugerencias del menú</h2>';
            echo '<div class="row row-cols-1  row-cols-lg-2 row-cols-xl-3 g-4">';
            $categorias = array_keys($menu);
        // Genera menús con imágenes asociadas a cada plato.
        // Nota: la selección de índice en el ejemplo original manipula probabilidades y debe garantizar índices válidos
        // (el índice máximo válido es count($platos)-1). Verificar los límites al usar rand().

            for ($i = 1; $i <= $n; $i++) {
                echo '<div class="col">';
                echo '<div class="card shadow-sm h-100 border-0 rounded-4">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title text-primary mb-4 text-center">Menú ' . $i . '</h5>';
                // * Generando grid 2x2 para mostrar las imágenes
                echo '<div class="container">';
                echo '<div class="row row-cols-2 g-3">';

                foreach ($categorias as $categoria) {
                    $platos = $menu[$categoria];
                    // Selección aleatoria con ponderación intencional:
                    // - Se usa rand(0, count($platos)) para generar valores en 0..count($platos)
                    // - Cuando count($platos) == 3, rand(0,3) produce 0,1,2,3. Los casos 2 y 3
                    //   se mapean ambos al índice 2 en el switch abajo, dando así el último plato
                    //   (índice 2) aproximadamente el doble de probabilidad de aparecer.
                    // - Esto es intencional para favorecer el último elemento en el conjunto.
                    $numAleatorio = rand(0, count($platos)); // * numero de 0 a length, para poder alterar las probabilidades
                    // * Manejamos las probabilidades con bucle switch (mapeo intencional de 2 y 3 a índice 2)
                    switch ($numAleatorio) {
                        case 0:
                            $indice = 0;
                            break;
                        case 1:
                            $indice = 1;
                            break;
                        case 2:
                        case 3:
                            $indice = 2;
                            break;
                    }
                    $plato = $platos[$indice];
                    $imagen = $imagenes[$categoria][$indice];
                    // * Generando card por categoria con imagenes
                    echo '<div class="col">';
                    echo '<div class="card border-0 shadow-sm rounded-4 text-center">';
                    echo '<img src="' . $imagen . '" alt="' . $plato . '" 
                            class="img-fluid w-100 object-fit-cover rounded-top-4"
                            style="height:120px">';
                    echo '<div class="card-body p-2">';
                    echo '<p class="card-text mb-1 fw-semibold text-secondary" style="font-size:0.9rem;">' . $categoria . '</p>';
                    echo '<p class="card-text text-dark" style="font-size:0.95rem;">' . $plato . '</p>';
                    echo '</div></div></div>';
                }

                echo '</div></div>';
                echo '</div></div></div>';
            }

            echo '</div></div>';
        }

        $menu = [
            'Entrante' => array('Ensalada César', 'Hummus', 'Boquerones al natural'),
            'Primero' => array('Gazpachuelo', 'Salmorejo', 'Ajo Blanco'),
            'Segundo' => array('Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'),
            'Postre' => array('Helado 3 sabores', 'Flan', 'Tarta de Queso')
        ];
        $imagenes = [
            'Entrante' => ['./src/entrante/ensalada_cesar.jpg', './src/entrante/hummus.jpg', './src/entrante/boquerones_al_natural.jpg'],
            'Primero' => ['./src/primero/gazpachuelo.jpg', './src/primero/salmorejo.jpg', './src/primero/ajo_blanco.jpg'],
            'Segundo' => ['./src/segundo/fritura.jpg', './src/segundo/conejo.jpg', './src/segundo/pisto_huevo.jpg'],
            'Postre' => ['./src/postre/helado.jpg', './src/postre/flan.jpg', './src/postre/tarta_queso.jpg']
        ];
        echo '<div class="card mb-4 shadow-sm">';
        echo '<div class="card-body">';
        echo '<h2 class="card-title text-secondary mb-3">Opciones del menú :</h2>';
        foreach ($menu as $key => $value) {
            echo "$key =>";
            foreach ($value as $valor) {
                echo " $valor ";
            }
            echo "<br>";
        }
        echo "</div></div>";
        if (isset($_GET['numSuge'])) {
            $numSuge = intval($_GET['numSuge']);
            generarMenus($numSuge, $menu, $imagenes);
        }
        ?>
    </div>
</body>

</html>