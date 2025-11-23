<?php  
    // Crea una nueva instancia de un objeto vacío de la clase stdClass.
    // stdClass es una clase genérica de PHP que se usa a menudo para crear objetos sobre la marcha.
    $moduloDWES = new stdClass();

    // Añade propiedades (atributos) al objeto $moduloDWES de forma dinámica.
    // La sintaxis -> se usa para acceder y asignar valores a las propiedades de un objeto.
    $moduloDWES->modulo = "Desarrollo Web en Entorno Servidor";
    $moduloDWES->acronimo = "DWES";
    $moduloDWES->curso = 2;
    $moduloDWES->descripcion = "Programación en PHP, gestión de sesiones, acceso a bases de datos, seguridad.";
    $moduloDWES->teacher = "Profesora Pilar";

    // Imprime un texto informativo. \n es un salto de línea.
    echo "Objeto stdClass original:\n";
    // print_r() muestra información legible para humanos sobre una variable.
    // En este caso, imprimirá la estructura y el contenido del objeto $moduloDWES.
    print_r($moduloDWES);

    // Usa la función serialize() para convertir el objeto $moduloDWES en una representación de cadena de texto.
    // Esta cadena contiene toda la información necesaria para reconstruir el objeto más tarde.
    $serializedDWES = serialize($moduloDWES);
    // Imprime un texto informativo.
    echo "\nSerializado:\n";
    // Muestra la cadena serializada. Verás un formato específico que PHP entiende.
    print_r($serializedDWES);

    // Usa la función unserialize() para tomar la cadena serializada y reconstruir el objeto original.
    $unserializedDWES = unserialize($serializedDWES);
    // Imprime un texto informativo.
    echo "\nDeserializado:\n";
    // Muestra el objeto reconstruido. Debería ser idéntico al objeto original.
    print_r($unserializedDWES);


?>