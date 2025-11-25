<?php 
    // 1. Habilita el modo estricto de tipos en este fichero.
    // Esto significa que PHP será más riguroso con los tipos de datos en las declaraciones de funciones y métodos.
    // Por ejemplo, si una función espera un 'int', no aceptará automáticamente un string como "5".
    declare(strict_types = 1);

    // 2. Define un "espacio de nombres" (namespace) llamado App\Utilidades.
    // Los namespaces son como carpetas para el código. Ayudan a organizar las clases y a evitar conflictos
    // si dos clases de diferentes librerías tienen el mismo nombre.
    namespace App\Utilidades;

    // 3. Define la clase Calculadora dentro del namespace App\Utilidades.
    class Calculadora{
        // Define un método estático 'sumar'. Al ser estático, se puede llamar directamente
        // desde la clase (Calculadora::sumar()) sin necesidad de crear un objeto de la misma.
        public static function sumar(int $a, int $b){
            return $a + $b;
        }
    }

    // 4. Define la clase FormateadorTexto, también dentro del namespace App\Utilidades.
    class FormateadorTexto{
        public function mayuscula($texto){
            return strtoupper($texto);
        }
    }

    // 5. Este código se ejecuta DENTRO del namespace App\Utilidades.
    // Crea un objeto de la clase FormateadorTexto y llama a su método.
    $formateador = new FormateadorTexto();
    echo $formateador -> mayuscula("hola mundo");

    // 6. Se define un NUEVO namespace en el mismo fichero: App\Controladores.
    // Todo el código a partir de aquí pertenecerá a este nuevo namespace.
    namespace App\Controladores;

    class UsuarioController{
        public function mostrarUsuario($nombre){
            echo "<br>El nombre del usuario es: $nombre";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16 - Relacion 4</title>
</head>

<body>
    <?php 
        // 7. A partir de aquí, el código está en el "espacio de nombres global" (fuera de cualquier namespace definido).
        // Para llamar al método 'sumar' de la clase Calculadora, debemos usar su "nombre completamente cualificado".
        // La barra invertida inicial `\` indica que la ruta parte del espacio de nombres raíz (global).
        echo "<br>" . \App\Utilidades\Calculadora::sumar(4,10);

        // NOTA: Estos 'require' probablemente sean restos de una versión anterior del código donde las clases
        // estaban en ficheros separados. Como las clases ya están definidas en este mismo fichero,
        // estos 'require' no son necesarios y podrían dar un error si los ficheros no existen.
        require 'FormateadorTexto.php';
    
        // 8. Se crea un objeto de FormateadorTexto usando de nuevo su nombre completo.
        $formateador = new \App\Utilidades\FormateadorTexto();
        echo "<br>" . $formateador->mayuscula("texto desde fuera del namespace");

        // 9. Se crea un ALIAS para un namespace completo.
        // 'use App\Utilidades as Util' permite referirnos a 'App\Utilidades' simplemente como 'Util'.
        use App\Utilidades as Util;

        // Se llama al método estático usando el alias del namespace.
        echo "<br>" . Util\Calculadora::sumar(8, 12);


        // 10. Se crea un ALIAS para una clase específica.
        // 'use App\Utilidades\Calculadora as Calc' permite usar 'Calc' como un atajo para 'App\Utilidades\Calculadora'.
        use App\Utilidades\Calculadora as Calc;

        // Se llama al método estático usando el alias de la clase.
        echo "<br>" . Calc::sumar(5, 4);

        // De nuevo, este 'require' no sería necesario si el código se mantiene en un solo fichero.
        require 'UsuarioController.php';

        // 11. Se crea un objeto de la clase UsuarioController, que está en el namespace App\Controladores.
        // Se usa su nombre completamente cualificado para evitar ambigüedades.
        $controlador = new \App\Controladores\UsuarioController();
        // Se llama a un método del objeto creado.
        $controlador->mostrarUsuario("Carlos");
            
    
    ?>


</body>
</html>