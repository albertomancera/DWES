<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Manejo de superglobals
    <?php

        echo "mostrando con var_dump";
        echo var_dump($_SERVER['DOCUMENT_ROOT']);

        echo "mostrando con print_r";
        echo print_r($_SERVER['DOCUMENT_ROOT']);

        echo "mostrando con echo";
        echo "DOCUMENT_ROOT" , $_SERVER['DOCUMENT_ROOT'],"<br>";
   
        foreach ($_SERVER as $clave => $valor) {
            # code...
            echo "$clave : $valor <br>";
        }

       




     ?>
</body>
</html>