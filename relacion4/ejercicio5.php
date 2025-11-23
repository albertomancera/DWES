<?php 
    // Define una clase llamada Restaurante. Una clase es una plantilla para crear objetos (instancias).
    // Cada objeto Restaurante tendrá sus propias propiedades (nombre, tipo de cocina, ratings).
    class Restaurante{
        // Declara una propiedad pública llamada 'nombre' de tipo string. Almacenará el nombre del restaurante.
        public string $nombre;
        // Declara una propiedad pública llamada 'tipoCocina' de tipo string. Almacenará el tipo de cocina.
        public string $tipoCocina;
        // Declara una propiedad pública llamada 'ratings' de tipo array. Almacenará una lista de puntuaciones.
        public array $ratings;

        // Define el método constructor. Se llama automáticamente cuando se crea un nuevo objeto con 'new Restaurante()'.
        // Su propósito es inicializar las propiedades del objeto.
        function __construct($nombre, $tipoCocina, $ratings=[]){
            // Asigna el valor del parámetro '$nombre' a la propiedad 'nombre' del objeto actual ($this).
            $this -> nombre = $nombre;
            // Asigna el valor del parámetro '$tipoCocina' a la propiedad 'tipoCocina' del objeto.
            $this -> tipoCocina = $tipoCocina;
            // Asigna el array del parámetro '$ratings' a la propiedad 'ratings'. Si no se pasa, se usa un array vacío por defecto.
            $this -> ratings = $ratings;
        }

        // Define el método destructor. Se llama automáticamente justo antes de que un objeto sea eliminado de la memoria.
        // Aquí está vacío porque no se necesita ninguna limpieza especial (ej. cerrar una conexión a base de datos).
        public function __destruct(){}

        // Define el método mágico __toString. PHP lo llama automáticamente cuando se intenta tratar al objeto como una cadena (ej. con 'echo').
        public function __toString(): string{
            // Convierte el array de ratings en una única cadena de texto, con los números separados por ", ".
            $ratingsStr = implode(", ", $this->ratings);
            // Devuelve una cadena formateada que representa el estado actual del objeto.
            return "Restaurante: {$this->nombre}, Tipo de cocina: {$this->tipoCocina}, Ratings: {$ratingsStr}";
        }

        // Define un método público para obtener el número de ratings que ha recibido el restaurante.
        public function obtenerNumeroRatings() : int{
            // Usa la función count() para contar cuántos elementos hay en el array 'ratings' y devuelve el número.
            return count($this -> ratings);
        }

        // Define un método para añadir una nueva puntuación (rating) al restaurante.
        public function añadirRating(int $ratings): void{
            // Añade el valor del parámetro '$ratings' al final del array 'ratings' del objeto.
            $this -> ratings[] = $ratings;
        }

        // Define un método para añadir un conjunto de nuevas puntuaciones desde un array.
        public function añadirRatings (array $nuevosRatings): void{
            // Fusiona el array 'ratings' actual con el array '$nuevosRatings' y actualiza la propiedad 'ratings'.
            $this -> ratings = array_merge($this->ratings, $nuevosRatings);
        }

        // Define un método para calcular la puntuación media del restaurante.
        public function calcularRatingMedio(): float{
            // Comprueba si el array 'ratings' está vacío para evitar un error de división por cero.
            if(empty($this -> ratings)){
                // Si no hay ratings, la media es 0.
                return 0;
            }
            // Suma todos los valores del array 'ratings' y lo divide por la cantidad de ratings para obtener la media.
            return array_sum($this -> ratings) / count($this -> ratings);
        }
        
    }

    // --- Uso de la clase Restaurante ---

    // Crea un nuevo objeto (una instancia) de la clase Restaurante llamado '$miRestaurante'.
    // Se invoca al constructor con "Dallas" como nombre y "Española" como tipo de cocina.
    $miRestaurante = new Restaurante("Dallas", "Española");

    // Imprime el objeto. PHP llama automáticamente al método __toString() para convertir el objeto a texto.
    echo $miRestaurante . "\n";

    // Llama al método añadirRating() del objeto para agregar la puntuación 5.
    $miRestaurante->añadirRating(5);
    echo $miRestaurante . "\n";

    // Llama al método añadirRatings() para agregar las puntuaciones 4, 3 y 5 de una vez.
    $miRestaurante->añadirRatings([4, 3, 5]);
    echo $miRestaurante . "\n";

    // Llama al método obtenerNumeroRatings() e imprime el resultado.
    echo "Número de ratings: " . $miRestaurante->obtenerNumeroRatings() . "\n";

    // Llama al método calcularRatingMedio() e imprime el resultado.
    echo "Rating medio: " . $miRestaurante->calcularRatingMedio() . "\n";

?>