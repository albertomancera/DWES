<?php
    //Si hubo envio imprime el nombre
    if($_POST){

    //Recibir informacion del formulario (Metodo POST)
    $nombre= $_POST['txtNombre'];

    echo $nombre;
    //Si no pongo el exit, vuelve a mostrarme el formulario
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio2.php" method="post">
        Nombre:
        <input type="text" name= "txtNombre" id="">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

