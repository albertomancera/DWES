<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>13. Manejo de Strings</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../Bootstrap Templates/src/styles/formStyle.css">
</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <form
            action="<?php echo $_SERVER['PHP_SELF'] ?>"
            class="border border-0 rounded-4 shadow-lg p-4 p-4 bg-secondary bg-opacity-25"
            method="get"
            id="form1">
            <h1 class="mb-4 text-center text-primary fw-bold">
                Manejo de Strings
            </h1>

            <div class="mb-3">
                <label for="texto" class="form-label">Introduzca una cadena de caracteres</label>
                <input
                    class="form-control rounded-3 bg-secondary bg-opacity-25 border border-black"
                    type="text"
                    name="texto"
                    id="texto" />
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-success me-md-2" type="submit">
                    Enviar
                </button>
                <button class="btn btn-outline-secondary" type="reset">Borrar</button>
            </div>
        </form>
        <?php 
        // Utilidades de manejo de strings: palíndromo, invertir palabras, mayúsculas/minúsculas, conteos y encriptados
        
        /**
         * Comprueba si una cadena es un palíndromo (se lee igual al derecho y al revés).
         * Muestra el resultado y la cadena invertida.
         */
        function esPalindromo($texto){
            $mensaje = "";
            // strrev() invierte la cadena. Comparamos la original con la invertida.
            if($texto == strrev($texto)){
                $mensaje = "La cadena es palíndroma";
            }else{
                $mensaje = "La cadena no es palíndroma";
            }
            // Muestra la cadena invertida y si es palíndroma
            echo "<div class='alert alert-primary' role='alert'>$texto del revés: " . strrev($texto) . "<br>$mensaje</div>";
        }

        /**
         * Invierte el orden de las palabras en una cadena.
         */
        function palabrasRevertidas($texto){
            //Devuelve la cadena con el orden de palabras invertido
            // 1. explode() convierte la cadena en un array de palabras, usando el espacio como separador.
            $palabras = explode(" ", $texto);
            // 2. array_reverse() invierte el orden de los elementos del array.
            $palabrasInvertidas = array_reverse($palabras);
            // 3. implode() une los elementos del array en una nueva cadena, usando el espacio como pegamento.
            $textoInvertido = implode(" ", $palabrasInvertidas);

            echo "<div class='alert alert-secondary' role='alert'>La cadena $texto con las palabras invertidas es: $textoInvertido</div>";
        }

        /**
         * Muestra la cadena en mayúsculas y minúsculas.
         */
        function mayusMinus($texto)
        {
            // Muestra la cadena en minúsculas y en mayúsculas
            echo "<div class='alert alert-success' role='alert'>En minúsculas: " . strtolower($texto) . "</div>";
            echo "<div class='alert alert-danger' role='alert'>En mayúsculas: " . strtoupper($texto) . "</div>";
        }

        /**
         * Cuenta los caracteres y las palabras de la cadena.
         */
        function recuentoString($texto)
        {
            // strlen cuenta caracteres; str_word_count cuenta palabras
            echo "<div class='alert alert-warning' role='alert'>La cadena $texto tiene " . strlen($texto) . " caracteres</div>";
            echo "<div class='alert alert-info' role='alert'>La cadena $texto tiene " . str_word_count($texto) . " palabras</div>";
        }

        /**
         * Muestra diferentes tipos de "hashes" o encriptaciones de la cadena.
         * Es una buena práctica advertir que md5 y sha1 no son seguros para contraseñas.
         */
        function encriptarTexto($texto)
        {
            // Ejemplos de funciones hash/crypt; notar que crypt/md5/sha1 no se deben usar para almacenar contraseñas en producción
            echo "<div class='alert alert-warning' role='alert'> $texto con crypt: " . crypt($texto, 'st') . "</div>";
            echo "<div class='alert alert-info' role='alert'>$texto con md5: " . md5($texto) .  "</div>";
            echo "<div class='alert alert-success' role='alert'>$texto con sha1: " . sha1($texto) .  "</div>";
        }
        
        // --- PUNTO DE ENTRADA DEL SCRIPT ---
        // Comprueba si el formulario ha sido enviado y existe la variable 'texto' en la URL.
        if (isset($_GET['texto'])) {
            // Recoge el valor del input y lo guarda en una variable.
            $texto = $_GET['texto'];

            // Estructura de Bootstrap para mostrar los resultados en dos columnas.
            echo "<div class='container mt-4'>";
                echo "<div class='row g-3'>";
                    echo "<div class='col-md-6'>";
                        esPalindromo($texto);
                        palabrasRevertidas($texto);
                        mayusMinus($texto);
                    echo "</div>";
                    echo "<div class='col-md-6'>";
                        recuentoString($texto);
                        encriptarTexto($texto);
                    echo "</div>";
            echo "</div></div>";
        }
        ?>
    </div>
</body>
</html>