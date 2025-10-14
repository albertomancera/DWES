<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 16</title>
</head>
<body>
    <h1>Divisores de un número entero</h1>
    <?php

        $num = 10;

        if($num <= 0){
            echo " El número debe ser entero y positivo";
        }else{
            for($i = 1; $i <= $num; $i++){
                if($num % $i == 0){
                    echo "<span style='color:red; font-weight:bold;'>$i </span>";
                }else{
                    echo "$i";
            }
        }
    }
    ?>

</body>
</html>