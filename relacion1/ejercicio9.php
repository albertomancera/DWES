<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <h1>Tipo de triángulo</h1>

    <?php
        $lado1 = 0;
        $lado2 = 0;
        $lado3 = 0;

        if($lado1 == $lado2 and $lado2 == $lado3){
            echo "El triangulo es equilatero";
        }else if ($lado1 == $lado2 or $lado2 = $lado3 or $lado3 == $lado1 ){
            echo "El triangulo es isoceles";
        }else{
            echo "El triangulo escaleno";
        };
    ?>
</body>
</html>