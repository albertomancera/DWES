<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11. Invertir elementos</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-5 text-primary">11 - Invirtiendo valores</h1>

        <?php
            // Incluir funciones auxiliares (swap, invertirArray) desde el archivo común
            include "./relacion3.php";

            // Definición de dos variables simples de tipo cadena
            $var1 = "Hola"; // valor inicial de var1
            $var2 = "Adios"; // valor inicial de var2

            // Definimos un array numérico con los valores del 1 al 10
            $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

            // --- Mostrar valores iniciales en una tarjeta Bootstrap ---
            // Abrimos la tarjeta
            echo '<div class="card mb-4 shadow-sm">';
            echo '<div class="card-body">';
            // Título de la sección
            echo '<h2 class="card-title text-secondary mb-3">Valores iniciales</h2>';
            // Lista que contendrá var1, var2 y el array
            echo '<ul class="list-group list-group-flush mb-3">';
            // Mostrar el valor actual de $var1
            echo "<li class='list-group-item'><strong>Var 1:</strong> $var1</li>";
            // Mostrar el valor actual de $var2
            echo "<li class='list-group-item'><strong>Var 2:</strong> $var2</li>";
            // Mostrar el array convertido a cadena separada por espacios
            echo "<li class='list-group-item'><strong>Array:</strong> " . implode(' ', $array) . "</li>";
            // Cerramos la lista y la tarjeta
            echo '</ul>';
            echo '</div>';
            echo '</div>';

            // --- Operaciones que modifican las variables/array por referencia ---
            // swap($var1, $var2) intercambia los valores de las variables pasadas
            swap($var1, $var2);
            // invertirArray($array) invierte el orden de los elementos del array in-place
            invertirArray($array);

            // --- Mostrar valores después de invertir ---
            echo '<div class="card shadow-sm">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title text-secondary mb-3">Valores invertidos</h2>';
            echo '<ul class="list-group list-group-flush">';
            // Ahora $var1 y $var2 han sido intercambiadas por la función swap
            echo "<li class='list-group-item'><strong>Var 1:</strong> $var1</li>";
            echo "<li class='list-group-item'><strong>Var 2:</strong> $var2</li>";
            // El array mostrado está en orden inverso gracias a invertirArray()
            echo "<li class='list-group-item'><strong>Array invertido:</strong> " . implode(' ', $array) . "</li>";
            echo '</ul>';
            echo '</div>';
            echo '</div>';

        ?>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>