<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Hola mundo en PHP</h1>
    <h3 style='color:red'>
        <i>
    <?php
        $nombre = "Alberto"; 
        echo "Hola $nombre";
        echo ' <br> Hola mundo' ;
        echo '<br> Hola ', $nombre; // la variable $ no se interpreta entre ' y '
        echo "<br> Hola ", strtoupper($nombre);
        //echo "<br> " .phpversion(), "<br>" .phpinfo();
        echo "<br> Hoy es : " , date("d.m.y H:m:s");
        
    ?>

        </i>
</body>
</html>
