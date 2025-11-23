<?php
    // Crea una nueva instancia de un objeto vacío genérico de la clase stdClass.
    // stdClass es la clase de objeto por defecto en PHP si conviertes un array a objeto, por ejemplo.
    $moduloDWES = new stdClass();
    
    // Se añaden propiedades al objeto $moduloDWES y se les asignan valores.
    // La sintaxis -> se usa para acceder a propiedades o métodos de un objeto.
    $moduloDWES -> modulo = "Desarrollo Web en Entorno Servidor";
    $moduloDWES -> acronimo = "DWES";
    $moduloDWES -> curso = 2;
    $moduloDWES -> descripcion = "Programación en PHP, gestión de sesiones, acceso a bases de datos, seguridad.";
    $moduloDWES -> teacher = "Profesora Pilar";
    
    // Imprime un texto informativo en la salida. \n es un carácter de nueva línea.
    echo "Objetos stdClass original; \n";
    // print_r() es una función que muestra información legible para humanos sobre una variable.
    // En este caso, mostrará la estructura del objeto $moduloDWES con sus propiedades y valores.
    print_r($moduloDWES);
    
    // Realiza una conversión de tipo (casting). Convierte el objeto $moduloDWES a un array asociativo.
    // Las propiedades del objeto se convierten en las claves del array, y sus valores en los valores del array.
    $arrayDWES = (array) $moduloDWES;
    // Imprime un texto informativo.
    echo "\nConvertido a array:\n";
    // Muestra la estructura y contenido del nuevo array $arrayDWES.
    print_r($arrayDWES);
    
    // Convertir el array a objeto
    // Realiza el proceso inverso: convierte el array asociativo $arrayDWES de nuevo a un objeto.
    // El resultado será un objeto de la clase stdClass, idéntico al original.
    $objDWES = (object) $arrayDWES;
    // Imprime un texto informativo.
    echo "\nConvertido de nuevo a objeto stdClass:\n";
    // Muestra la estructura y contenido del objeto $objDWES, que ha sido restaurado desde el array.
    print_r($objDWES);

?>