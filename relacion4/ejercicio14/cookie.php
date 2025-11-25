<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie - Ejercicio 14</title>
</head>

<body>
    <?php 
        // 1. Comprueba si existe una cookie llamada "carro".
        // La superglobal $_COOKIE es un array asociativo que contiene todas las cookies
        // que el navegador ha enviado al servidor con la petición actual.
        if(isset($_COOKIE["carro"])){
            // 2. Si la cookie existe, se recupera su valor.
            // El valor será la cadena de texto en formato JSON que guardamos en la página anterior.
            $carroCookie = $_COOKIE["carro"];
            echo "<h2>Cookie capturada </h2><br>";

            // 3. Se decodifica la cadena JSON para convertirla de nuevo en un array asociativo de PHP.
            // La función json_decode() hace la operación inversa a json_encode().
            // El segundo parámetro 'true' es importante: le dice a la función que cree un array asociativo.
            $array1 = json_decode($carroCookie, true);

            // 4. Se muestra el contenido del array asociativo reconstruido.
            // La etiqueta <pre> ayuda a que la salida de var_dump() sea más legible.
            echo "<h2>Array asociativo </h2><br>";
            echo "<pre>";
            var_dump($array1);
            echo "</pre>";

            // 5. Como ejemplo, se decodifica la misma cadena JSON pero esta vez sin el parámetro 'true'.
            // Esto convierte la cadena JSON en un objeto PHP de la clase estándar (stdClass).
            $obj = json_decode($carroCookie);

            // 6. Se muestra el contenido del objeto reconstruido.
            echo "<h2>Obj stdClass </h2><br>";
            echo "<pre>";
            var_dump($obj);
            echo "</pre>";
        }else{
            // 7. Si la cookie "carro" no se encuentra en la petición, se muestra este mensaje.
            // Esto podría pasar si el navegador tiene las cookies deshabilitadas o si se accede a esta página directamente.
            echo "<p>La cookie 'carro' no está disponible todavía </p>";
        }
    ?>

</body>
</html>