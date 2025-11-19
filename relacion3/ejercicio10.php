<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10. Desordenando palabras</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../Bootstrap Templates/src/styles/formStyle.css">
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
        <form class="border border-0 rounded-4 shadow-lg p-4 p-4 bg-secondary bg-opacity-25" method="get" 
        action=<?php echo $_SERVER['PHP_SELF'] ?> id="form1">
        <h1 class="mb-4 text-center text-primary fw-bold"> Desordenando palabras</h1>

        <div class="mb-3">
            <label for="texto" class="form-label">Introduzca un texto:</label>
            <input class="form-control rounded-3 bg-secondary bg-opacity-25 border "type="text" name="texto" id="texto"/>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button class="btn btn-success me-md-2" type="submit"> Enviar</button>
            <button class="btn btn-outline-secondary" type="reset">Borrar</button>
        </div>
        </form>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

    <?php 
        //Devuelve el texto con las palabras en orden inverso
        function desordenarPalabras(){
            if(isset($_GET['texto'])){
                $texto = $_GET['texto'];
                
                //Separar por espacios y revertir el array de palabras
                $palabras = explode(" ",$texto);
                $palabrasRevertidas = array_reverse($palabras);
                echo "<div class='text-center me-5'><br><p>El texto al revés es: ";

                for($i = 0; $i < count($palabrasRevertidas); $i++){
                    echo "$palabrasRevertidas[$i]" . " ";
                }
                echo "</p></div>";
            }
        }
    desordenarPalabras();    
    ?>

</body>
</html>