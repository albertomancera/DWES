<?php
    /*echo($_POST['usuario']);
    echo("<br>");
    echo($_POST['contraseña'])*/

    $usuario = $_POST['usuario'];
    $password = $_POST['contraseña'];

    //conectarse a la base datos
    //autenticar al usuario

    echo "El usuario es " . $usuario . "<br>";
    echo "La contraseña es " . $password;
?>