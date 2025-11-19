<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>18. Menú de restaurante</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body class="bg-light">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center mb-5 text-primary">18- Menú restaurante</h1>
        <form class="form" action=<?php echo $_SERVER['PHP_SELF']; ?> method="get">
            <label for="numSuge">Introduzca el nº de sugerencias de menú:</label> <br>
            <input type="number" name="numSuge" id="numSuge" required>
            <button type="submit">Generar sugerencias</button>
        </form> <br><br>
        <?php
        $menu = [
            'Entrante' => array('Ensalada César', 'Hummus', 'Boquerones al natural'),
            'Primero' => array('Gazpachuelo', 'Salmorejo', 'Ajo Blanco'),
            'Segundo' => array('Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'),
            'Postre' => array('Helado 3 sabores', 'Flan', 'Tarta de Queso')
        ];
        function mostrarSugerencias($n, $menu)
        {
            if ($n < 1 || $n > 81) {
                throw new ValueError("Error, el menú debe tener entre 1 y 81 sugerencias");
            }

            echo '<div class="container mt-4">';
            echo '<h2 class="text-secondary mb-4 text-center">Sugerencias del menú</h2>';
            echo '<div class="row row-cols-1  row-cols-lg-2 row-cols-xl-3 g-4">';
            $categorias = array_keys($menu);
            $ultimaSugerencia = [];

            // Generamos $n menús completos
            for ($i = 1; $i <= $n; $i++) {
                echo '<div class="col">';
                echo '<div class="card shadow-sm h-100 border-0 rounded-4">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title text-primary mb-3 text-center">Menú ' . $i . '</h5>';
                echo '<div class="d-flex flex-column gap-2">';
                foreach ($categorias as $categoria) {
                    $platos = $menu[$categoria];
                    do {
                        $indice = rand(0, count($platos) - 1);
                    // Validación básica del número de sugerencias
                        $plato = $platos[$indice];
                    } while (isset($ultimaSugerencia[$categoria]) && $ultimaSugerencia[$categoria] == $plato);
                    $ultimaSugerencia[$categoria] = $plato;
                    echo '<div class="border-bottom pb-1">';
                    // Genera visualmente n menús completos, evitando repetir el mismo plato en una categoría en menús consecutivos
                    echo '<strong>' . $categoria . ':</strong> ' . $plato;
                    echo '</div>';
                }
                echo '</div></div></div></div>';
            }
            echo '</div></div>';
        }




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
            try {
                mostrarSugerencias($numSuge, $menu);
            } catch (\ValueError $th) {
                echo $th->getMessage();
            }
        }
        ?>
    </div>
</body>

</html>