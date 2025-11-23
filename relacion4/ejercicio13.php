<?php   
    // Define un array multidimensional llamado $socios.
    // Cada elemento del array principal es un array asociativo que representa a un socio con sus datos.
    $socios = [
        [
            "nombre" => "Ana",
            "apellidos" => "Martínez López",
            "edad" => 25
        ],
        [
            "nombre" => "Carlos",
            "apellidos" => "Gómez Ruiz",
            "edad" => 30
        ],
        [
            "nombre" => "Lucía",
            "apellidos" => "Fernández Pérez",
            "edad" => 28
        ]
        ];    // Convertir el array asociativo a JSON


    // Imprime un texto informativo en la salida. \n es un carácter de nueva línea.
    echo "Array asociativo original: \n";
    // print_r() muestra información legible para humanos sobre una variable.
    // En este caso, imprimirá la estructura y contenido del array $socios.
    print_r($socios);

    // Usa la función json_encode() para convertir el array PHP $socios en una cadena de texto con formato JSON.
    // JSON (JavaScript Object Notation) es un formato ligero de intercambio de datos, muy común en aplicaciones web.
    $jsonSocios = json_encode($socios);
    // Imprime un texto informativo.
    echo "\n\nConvertido a JSON:\n";
    // Imprime la cadena JSON resultante.
    echo $jsonSocios;

    // Usa la función json_decode() para convertir la cadena JSON de vuelta a una estructura de PHP.
    // El segundo parámetro 'true' indica que se debe crear un array asociativo.
    $arraySocios = json_decode($jsonSocios, true);
    // Imprime un texto informativo.
    echo "\n\nJSON convertido de nuevo a array asociativo:\n";
    // Muestra el contenido del array asociativo restaurado.
    print_r($arraySocios);

    // Usa json_decode() sin el segundo parámetro 'true' (o poniéndolo a 'false').
    // Esto convierte la cadena JSON en un array de objetos de la clase stdClass.
    $objSocios = json_decode($jsonSocios);
    // Imprime un texto informativo.
    echo "\n\nJSON convertido en objeto stdClass:\n";
    // Muestra la estructura del array de objetos.
    print_r($objSocios);


?>