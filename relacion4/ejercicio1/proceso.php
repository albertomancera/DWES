<?php 
    session_start();

    function compruebaAcceso($id, $contrasenya){
        define ("ID_CORRECTA","alberto");
        define ("CONTRASENYA_CORRECTA","1234");

        return ($id== ID_CORRECTA && $contrasenya == CONTRASENYA_CORRECTA);
    }

    $idusuario = $_POST["usuario"];
    $contrasenya = $_POST["contrasenya"];
    unset($_SESSION['errorLogin']);

    if(compruebaAcceso($idusuario, $contrasenya)){
        setcookie("usuario", $idusuario);

        
        if (isset($_COOKIE['usuario'])){
            echo "Bienvenido <br>";
            echo "Te llamas ", $_COOKIE['usuario'], "<br>";
        }
        $_SESSION['usuario'] = $idusuario;

        echo "Tu eres ", $_SESSION['usuario'], " según tu variable de sesión";
    } else {
        $_SESSION['errorLogin'] = true;
        header("Location: ejercicio1.php");
    }

?>