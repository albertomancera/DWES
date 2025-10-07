<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Programa que calcula la nota a partir de 2 notas</h2>
    <?php
        $nota1 = 7;
        $nota2 = 4;
        $faltas = 5;

        $notaFinal = ($nota1 + $nota2 ) / 2 - 0.25 * $faltas;

        if($notaFinal >=5){
            echo " <h2> Enhoarbuena, estás aprobado con un <b> $notaFinal </b></h2>";
        }else{
            echo "<h2> Estás suspenso con un <b> $notaFinal </b>, eres malisimo </h2>";
        };
    ?>

</body>
</html>