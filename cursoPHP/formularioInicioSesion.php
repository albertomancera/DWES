<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="menu">
        <ul>
            <li><a href="#" class="active">Iniciar Sesión </a></li>
        </ul>
    </div>

    <div id="formularios" class="form-control">
        <form action="recibir_post.php" id="form-sesion" method="post">
            <p>Correo electrónico</p>
            <div class="mb-3">
                <input name="usuario" type="text" placeholder="user@example.com"><br>
            </div>

            <p>Contraseña:</p>
            <div class="mb-3">
                <input name="contraseña" type="password" placeholder="*******"><br>
            </div>
            <p class="center-content">
                <input  type="submit" value="Iniciar Sesión"><br>
                <a href="recibir_get.php?tipo_usuario=nuevo&navegador=chrome">Resgistrar cuenta</a>
            </p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>