<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 17</title>
</head>
<body>
    <h1>Calcula la división de 2 números utilizando el algoritmo de Euclides</h1>
    <?php
        $dividendo = 17;
        $divisor = 3;

        if($dividendo < 0 || $divisor <=0){
            echo "Los números deben ser naturales y el divisor mayor que 0";
        }else{
            $cociente = 0;
            $resto = $dividendo;

            while($resto >= $divisor){
                $resto = $resto - $divisor;
                $cociente++;
            }

            echo "Cociente = $cociente<br>";
            echo "Resto = $resto";
        }

    ?>



</body>
</html>