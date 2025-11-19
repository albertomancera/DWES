<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7. Fechas en español</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../Bootstrap Templates/src/styles/formStyle.css">
</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <form
            action="<?php echo $_SERVER['PHP_SELF'] ?>"
            class="border border-0 rounded-4 shadow-lg p-4 p-4 bg-secondary bg-opacity-25"
            method="get"
            id="form1">
            <h1 class="mb-4 text-center text-primary fw-bold">
                Muestra fechas en español
            </h1>

            <div class="mb-3">
                <label for="fecha" class="form-label">Introduzca una fecha</label>
                <input
                    class="form-control rounded-3 bg-secondary bg-opacity-25 border "
                    type="date"
                    name="fecha"
                    id="fecha" />
            </div>


            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-success me-md-2" type="submit">
                    Calcular
                </button>
                <button class="btn btn-outline-secondary" type="reset">Borrar</button>
            </div>
        </form>
        <?php 
        //Muestra el dia de la semana y el mes en español a partir de una fecha 'YYYY-MM-DD'
        function mostrarDiaSemana(){
            if(isset($_GET['fecha'])){
                $fechaStr = $_GET['fecha'];
                $fecha = new DateTime($fechaStr);
                $numDia = date_format($fecha, "N");
                $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes","Sabado","Domingo"];
                // date_format(...,"N") devuelve 1..7 para lun..dom, por eso restamos 1 para indexar el array
                echo "<br><div class='text-center me-5'><p>Hoy es: <b>" . $dias[$numDia - 1] . "</b></p></div>";
            }
        }

        function mostrarMes(){
            if(isset($_GET['fecha'])){
                $fechaStr = $_GET['fecha'];
                $fecha = new DateTime($fechaStr);
                $numMes = date_format($fecha, "m");
                $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                // date_format(...,"m") devuelve '01'..'12'; al convertirlo a índice restamos 1
                echo "<br><div class='text-center me-5'><p>Estamos en el mes: <b>" . $meses[$numMes - 1] . "</b></p></div>";
            }
        }
        
        mostrarDiaSemana();
        mostrarMes();   
        ?>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>
</body>
</html>