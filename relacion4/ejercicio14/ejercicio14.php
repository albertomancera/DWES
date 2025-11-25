<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14 - Relacion 4</title>
</head>

<body>
    <?php
    // 1. Se define un array multidimensional llamado $carro.
    // Este array simula el contenido de un carrito de la compra, donde cada elemento
    // es a su vez un array asociativo que representa un artículo con sus detalles.
    $carro = [
        "art1" => [
            "codigo" => "00A",
            "nombre" => "Monitor",
            "unidades" => 2,
            "precio" => 75.5
        ],
        "art2" => [
            "codigo" => "00B",
            "nombre" => "Raton optico",
            "unidades" => 2,
            "precio" => 17.25
        ],
        "art3" => [
            "codigo" => "01B",
            "nombre" => "Teclado portatil",
            "unidades" => 5,
            "precio" => 23.25
        ]
    ];

    // 2. Se muestra el contenido del array original en un formato legible.
    // La etiqueta <pre> hace que el navegador respete los espacios y saltos de línea,
    // lo que facilita la lectura de la salida de var_dump().
    echo "<pre>";
    echo "<h3>Carrito</h3><br>";
    var_dump($carro);
    echo "</pre>";

    // 3. Se convierte el array $carro a una cadena de texto en formato JSON.
    // Las cookies solo pueden almacenar datos de tipo string, por lo que es necesario
    // serializar (convertir) el array a una cadena para poder guardarlo. JSON es un formato ideal para esto.
    $carroEncode = json_encode($carro);

    // 4. Se muestra la cadena JSON resultante.
    echo "<pre>";
    echo "<h3>Encode<br></h3>";
    var_dump($carroEncode);
    echo "</pre>";

    // 5. Se crea una cookie llamada "carro" y se le asigna como valor la cadena JSON.
    // Esta función envía una instrucción al navegador del usuario para que guarde la cookie.
    setcookie("carro", $carroEncode);

    // NOTA: La superglobal $_COOKIE contiene las cookies que el navegador envía AL SERVIDOR.
    // La cookie que acabamos de crear con setcookie() no estará disponible en $_COOKIE
    // hasta la PRÓXIMA petición (es decir, la próxima vez que el usuario cargue una página de este sitio).
    // Por eso, para verificar que se ha guardado, hemos creado un enlace a otra página.
    ?>

    <!-- 6. Se crea un enlace a otra página (cookie.php). Al hacer clic, el navegador
        enviará la cookie "carro" que acabamos de crear, y esa página podrá leerla. -->
    <button><a href="cookie.php">Otra Pagina</a></button>
</body>

</html>