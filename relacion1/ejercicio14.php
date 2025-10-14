<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 14</title>
</head>
<body>
    <h1>Calcular la suma de los n primeros números naturales</h1>

    <?php
        $n = 10;

        if($n <= 0){
            echo "El número debe de ser entero y positivo";
        } else{
            $suma = 0;         //Acumulador de sumas
            $operacion = ""; //Cadena para mostrar el cálculo

            for($i = 1; $i <= $n; $i++){
                $suma += $i;
                
                if($i < $n){
                    $operacion = $operacion . $i . " + ";
                }else{
                    $operacion = $operacion . $i;
                }
            }

            echo "$operacion = $suma";
        }
        
    

    ?>
</body>
</html>