<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: linear-gradient(135deg, #667eea 0%, #764b2a 100%); /*Fondo degradado*/
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card{
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

    </style>
</head>
<body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card p-4">
                        <div class="card-body">
                        <form action="recibir_post.php" id="form-mb-3" method="post">
                            <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                            <form action="recibir_post.php" id="loginForm" method="post">
                            <div class="mb-3">
                                <label for="usuario" class="form-label fw-bold" >Usuario</label>
                                <input id="usuario" name="usuario" class="form-control" type="text" placeholder="user@example.com" required><br>
                            </div>

                            
                            <div class="mb-3">
                                <label for="contrasena" class="form-label fw-bold" >Contraseña</label>
                                <input  id="contrasena" name ="contrasena" class="form-control" type="password" placeholder="*******" required><br>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit" value="Iniciar Sesión">Inicio Sesión</button><br>
                            </div>
                            <div>
                                
                                <a href="recibir_get.php?tipo_usuario=nuevo&navegador=chrome">Resgistrar cuenta</a>

                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>