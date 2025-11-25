    <?php 
    // Definición de la clase Restaurante. Una clase es una plantilla para crear objetos.
    // Cada objeto 'Restaurante' tendrá sus propias propiedades (nombre, tipo de cocina, etc.) y métodos (funciones).
    class Restaurante {
        // Propiedad estática privada para contar el número total de restaurantes creados.
        // 'private' significa que solo se puede acceder desde dentro de esta clase.
        // 'static' significa que esta propiedad pertenece a la clase en sí, no a una instancia (objeto) particular. Es compartida por todos los objetos de la clase.
        // 'int' especifica que el tipo de dato es un entero. Se inicializa en 0.
        private static int $numeroRest = 0;

        // El método constructor. Se llama automáticamente cuando se crea un nuevo objeto de la clase con 'new Restaurante(...)'.
        // Utiliza la "promoción de propiedades del constructor" de PHP 8, que declara y asigna propiedades a la vez.
        // 'private string $nombre': Declara una propiedad privada llamada 'nombre' de tipo string.
        // 'private string $tipoCocina': Declara una propiedad privada llamada 'tipoCocina' de tipo string.
        // 'private array $ratings = []': Declara una propiedad privada llamada 'ratings' de tipo array, con un valor por defecto de un array vacío.
        public function __construct(private string $nombre, private string $tipoCocina, private array $ratings = []) {
            // Incrementa el contador estático de restaurantes cada vez que se crea una nueva instancia.
            // 'self::' se usa para acceder a miembros estáticos (propiedades o métodos) de la clase actual.
            self::$numeroRest++;
        }

        // El método destructor. Se llama automáticamente cuando un objeto está a punto de ser destruido (por ejemplo, al final del script o cuando no hay más referencias a él).
        // En este caso, está vacío y no realiza ninguna acción específica de limpieza.
        public function __destruct() {}

        // El método mágico __toString. Define cómo debe comportarse un objeto cuando se trata como una cadena de texto (ej. con 'echo').
        // ': string' indica que este método debe devolver un valor de tipo string.
        public function __toString(): string {
            // Convierte el array de ratings en una cadena de texto, con los elementos separados por ", ".
            $ratingsStr = implode(", ", $this->ratings);
            // Devuelve una cadena formateada con los detalles del restaurante.
            // '$this->nombre' accede a la propiedad 'nombre' del objeto actual.
            return "Restaurante: {$this->nombre}, Tipo de cocina: {$this->tipoCocina}, Ratings: {$ratingsStr}";
        }

        // --- Getters ---
        // Métodos públicos para obtener el valor de las propiedades privadas.
        // Esto sigue el principio de encapsulación, controlando el acceso a los datos del objeto desde fuera de la clase.

        // Devuelve el nombre del restaurante.
        public function getNombre(): string {
            return $this->nombre;
        }

        // Devuelve el tipo de cocina del restaurante.
        public function getTipoCocina(): string {
            return $this->tipoCocina;
        }

        // Devuelve el array de ratings del restaurante.
        public function getRatings(): array {
            return $this->ratings;
        }

        // --- Setters ---
        // Métodos públicos para modificar el valor de las propiedades privadas.
        // Permiten cambiar el estado del objeto de una manera controlada.

        // Establece un nuevo nombre para el restaurante.
        public function setNombre(string $nombre): void {
            $this->nombre = $nombre;
        }

        // Establece un nuevo tipo de cocina para el restaurante.
        public function setTipoCocina(string $tipoCocina): void {
            $this->tipoCocina = $tipoCocina;
        }

        // Reemplaza el array de ratings existente por uno nuevo.
        public function setRatings(array $ratings): void {
            $this->ratings = $ratings;
        }

        // --- Métodos de la clase ---

        // Método que devuelve el número total de ratings que tiene el restaurante.
        public function obtenerNumeroRatings(): int {
            // 'count()' es una función de PHP que devuelve el número de elementos en un array.
            return count($this->ratings);
        }

        // Método para añadir un único rating al array de ratings.
        public function añadirRating(int $rating): void {
            // '[]' al final de un array añade el nuevo elemento al final del mismo.
            $this->ratings[] = $rating;
        }

        // Método para añadir varios ratings a la vez desde otro array.
        public function añadirRatings(array $nuevosRatings): void {
            // 'array_merge()' combina dos o más arrays en uno solo.
            $this->ratings = array_merge($this->ratings, $nuevosRatings);
        }

        // Método que devuelve la media de los ratings.
        public function calcularRatingMedio(): float {
            // Comprueba si el array de ratings está vacío para evitar una división por cero.
            if (empty($this->ratings)) {
                return 0; // Si no hay ratings, la media es 0.
            }
            // 'array_sum()' suma todos los valores de un array.
            // Se divide la suma total por el número de ratings para obtener la media.
            return array_sum($this->ratings) / count($this->ratings);
        }

        // Método estático para obtener el total de restaurantes creados.
        // Al ser 'static', se puede llamar directamente desde la clase sin necesidad de crear un objeto: Restaurante::totalRests().
        public static function totalRests(): int {
            return self::$numeroRest;
        }
    }

    // Creación de un objeto (instancia) de la clase Restaurante. Se llama al constructor.
    $rest1 = new Restaurante("Dallas", "Española");
    // Creación de un segundo objeto, esta vez pasando también un array de ratings inicial.
    $rest2 = new Restaurante("La Bellavista", "Italiana", [5,4,3]);

    // Al usar 'echo' sobre un objeto, se invoca automáticamente su método __toString().
    echo $rest1 . "\n";
    echo $rest2 . "\n";

    // Llama al método estático 'totalRests' para obtener el número total de restaurantes creados.
    echo "Total de restaurantes creados: " . Restaurante::totalRests() . "\n";

?>