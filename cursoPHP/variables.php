<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Variables
    $edad = 39;
    $estatura = 1.67;
    $nombre="Luis Javier";
    $frase = "Luisja tiene $edad años";
    $frase2 = 'Luisja tiene $edad años';
    $profesor = true;

    echo $edad;
    echo "<br>";
    echo $estatura;
    echo "<br>";
    echo "Tu nombre es " .$nombre;
    echo "<br>";
    echo json_encode($profesor);

    // $6edad = "hola";

    ?>
</body>
</html>