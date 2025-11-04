<?php
    // Solo ejecuta el cálculo si el formulario fue enviado
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = htmlspecialchars($_POST["nombre"]);
            $email = htmlspecialchars($_POST["email"]);
            $primera = floatval($_POST["primera"]);
            $segunda = floatval($_POST["segunda"]);
            $faltas = intval($_POST["faltas"]); // número entero

            // ---  Definimos los pesos de la rúbrica ---
            // En tu formulario solo tienes dos notas y las faltas.
            // Así que haremos un cálculo ponderado con:
            //  - primera (40%)
            //  - segunda (40%)
            //  - penalización por faltas (cada falta resta 0.25 puntos)
            $rubrica = [
                "primera" => 0.4,
                "segunda" => 0.4
            ];

            // ---  Calculamos la nota media ponderada ---
            $notaFinal = ($primera * $rubrica["primera"]) + ($segunda * $rubrica["segunda"]);

            // Penalización por faltas (0.25 puntos menos por cada falta)
            $notaFinal -= ($faltas * 0.25);

            // ---  Limitar nota entre 0 y 10 ---
            if ($notaFinal < 0) $notaFinal = 0;
            if ($notaFinal > 10) $notaFinal = 10;

            // ---  Mostrar resultado con formato Bootstrap ---
            echo "<h2 class='text-center text-primary mb-4'>Resultado de $nombre</h2>";

            if ($notaFinal >= 5) {
                echo "<div class='alert alert-success text-center'>
                        <h4>¡Enhorabuena, $nombre!</h4>
                        Has aprobado con una nota de <strong>" . round($notaFinal, 2) . "</strong><br>
                        Se enviará el resultado a: <b>$email</b>
                    </div>";
            } else {
                echo "<div class='alert alert-danger text-center'>
                        <h4>$nombre, estás suspenso 😢</h4>
                        Tu nota final es <strong>" . round($notaFinal, 2) . "</strong><br>
                        Se notificará a: <b>$email</b>
                    </div>";
            }

            // --- Botón para volver al formulario ---
            echo "<div class='text-center mt-4'>
                    <a href='javascript:history.back()' class='btn btn-primary'>Volver al formulario</a>
                </div>";

        } else {
            // Si alguien entra directo a este archivo sin pasar por el formulario
            echo "<div class='alert alert-warning text-center'>
                    <strong>Acceso no permitido.</strong> Usa el formulario para enviar los datos.
                </div>";
        }
        ?>