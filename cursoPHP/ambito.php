<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $valor1=10;
        $valor2=50;

        function prueba(){
            //Global llama a las variables de fuera
            global $valor1, $valor2;
            
            $valor3 =  $valor1 + $valor2;

            echo $valor3;
        }
    ?>
</body>
</html>