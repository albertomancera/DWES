<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$rubrica = ["inicial" => 0.20,
            "primera" => 0.30,
            "segunda" => 0.20,
            "tercera" => 0.30];

$calificaciones = ["inicial" => 8,
            "primera" => 5,
            "segunda" => 9,
            "tercera" => 6];

        $notaFinal = 0; //inicializamos a 0 el acumulador
    foreach ($rubrica as $prueba=> $peso) { //recorro un array secuencialmente
            $notaFinal += $peso * $calificaciones[$prueba];//acumulacion
    };
    
     if($notaFinal >=5){
            echo " <h2> Enhoarbuena, estás aprobado con un <b> $notaFinal </b></h2>";
        }else{
            echo "<h2> Estás suspenso con un <b> $notaFinal </b>, eres malisimo </h2>";
        };
    ?>
</body>
</html>