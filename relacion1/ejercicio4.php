<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php

    //error reporting (E_ALL )
        const SEMANA = ["lunes","martes","miercoles","jueves","viernes","sabado","domingo"];

        echo " <br>el primer dia de la semana es: ", SEMANA[0];
        echo "<br> una semana tiene " .count(SEMANA) , " dias";
        
        echo "<br>todos los dias de la semana son: " ;
    echo "<ol>";
        for ($i=0; $i < count(SEMANA); $i++) { 
            echo"<li>" , SEMANA[$i], "</li>";
        }

    echo "</ol>";
    ?>

</body>
</html>