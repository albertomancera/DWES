<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1- Ejercicio 18</title>
</head>
<body>
    <h1>Máximo Común Divisor con Eiclides</h1>

    <?php
        $a = 48;
        $b = 18;

        while($a != $b){
            if($a > $b){
                $a -= $b;
            }else{
                $b -= $a;
            }

            echo "El MCD es $a ";
        }

    ?>
</body>
</html>aq