<?php 
    // Se define una clase llamada BanderaFranjas. Una clase es una plantilla para crear objetos.
    // En este caso, cada objeto representará una bandera con franjas.
    class BanderaFranjas{
        // Propiedad privada para guardar la orientación de las franjas ("horizontal" o "vertical").
        // 'private' significa que solo se puede acceder desde dentro de esta clase.
        private string $orientacion;
        // Propiedad privada para guardar un array (lista) con los colores de las franjas.
        private array $franjas;
        // Propiedad privada para guardar el nombre de la bandera (ej: el nombre de un país).
        private string $nombre;

        // Este es el método constructor. Se ejecuta automáticamente al crear un nuevo objeto de la clase.
        // Sirve para inicializar las propiedades del objeto con los valores que se le pasen.
        public function __construct(string $orientacion, array $franjas, string $nombre)
        {
            // Asigna el valor del parámetro $orientacion a la propiedad $orientacion del objeto.
            // '$this' se refiere al objeto actual que se está creando.
            $this-> orientacion =  $orientacion;
            // Asigna el array de colores del parámetro $franjas a la propiedad $franjas del objeto.
            $this -> franjas = $franjas;
            // Asigna el valor del parámetro $nombre a la propiedad $nombre del objeto.
            $this -> nombre = $nombre;
        }

        // Este es el método destructor. Se llama automáticamente cuando un objeto va a ser eliminado.
        // En este caso está vacío porque no se necesita realizar ninguna acción de limpieza especial.
        public function __destruct(){}

        // Método para mostrar la información de la bandera en la pantalla.
        public function mostrarBandera(): void{
            // 'echo' imprime un texto. Aquí se combinan cadenas de texto con las propiedades del objeto.
            // 'implode(", ", $this -> franjas)' une los colores del array en un solo texto, separados por ", ".
            echo "Bandera de  {$this -> nombre} ({$this -> orientacion}): " . implode(", ", $this -> franjas) ."\n";
        }

        // Método para comprobar si esta bandera es idéntica a otra que se le pasa como parámetro.
        public function esIdentica(BanderaFranjas $otraBandera): bool{
                // Devuelve 'true' (verdadero) solo si la orientación, las franjas y el nombre son exactamente iguales
                // en ambas banderas. '===' comprueba que tanto el valor como el tipo sean idénticos.
                return $this->orientacion === $otraBandera->orientacion &&
                $this->franjas === $otraBandera->franjas &&
                $this->nombre === $otraBandera->nombre;
        }
    
        // Método para comprobar si esta bandera tiene las mismas franjas que otra, pero distinta orientación.
        public function mismasFranjasDistintaOrientacion(BanderaFranjas $otra):bool{
            // Devuelve 'true' si el array de franjas es igual ('==') y la orientación es distinta ('!==').
            return $this->franjas == $otra->franjas &&
                $this->orientacion !== $otra->orientacion;
        }

        // Método para invertir el orden de los colores de las franjas.
        public function invertirColores(): void {
            // 'array_reverse' es una función de PHP que devuelve un array con los elementos en orden inverso.
            // El resultado se asigna de nuevo a la propiedad $franjas, modificando la bandera.
            $this->franjas = array_reverse($this->franjas);
        }

        // Método para cambiar la orientación de la bandera.
        public function invertirOrientacion(): void {
            // Se usa un operador ternario: es una forma corta de escribir un 'if-else'.
            // Si la orientación actual es "horizontal", la cambia a "vertical". Si no, la cambia a "horizontal".
            $this->orientacion = ($this->orientacion === "horizontal") ? "vertical" : "horizontal";
        }
    
    }

    
    // Se crea un nuevo objeto (instancia) de la clase BanderaFranjas y se guarda en la variable $bandera1.
    $bandera1 = new BanderaFranjas("horizontal", ["rojo", "blanco", "azul"], "País A");
    // Se crea otro objeto, idéntico al primero.
    $bandera2 = new BanderaFranjas("horizontal", ["rojo", "blanco", "azul"], "País A");
    // Se crea un tercer objeto, con la misma bandera pero orientación vertical.
    $bandera3 = new BanderaFranjas("vertical", ["rojo", "blanco", "azul"], "País A");

    // Se llama al método mostrarBandera() para cada uno de los objetos, imprimiendo sus detalles.
    $bandera1->mostrarBandera();
    $bandera2->mostrarBandera();
    $bandera3->mostrarBandera();

    // Se comprueba si bandera1 es idéntica a bandera2 y se imprime "Sí" o "No" según el resultado.
    echo "¿Bandera1 idéntica a Bandera2? " . ($bandera1->esIdentica($bandera2) ? "Sí" : "No") . "\n";
    // Se comprueba si bandera1 es idéntica a bandera3.
    echo "¿Bandera1 idéntica a Bandera3? " . ($bandera1->esIdentica($bandera3) ? "Sí" : "No") . "\n";
    // Se comprueba si bandera1 y bandera3 tienen las mismas franjas pero distinta orientación.
    echo "¿Bandera1 y Bandera3 tienen mismas franjas distinta orientación? " . 
        ($bandera1->mismasFranjasDistintaOrientacion($bandera3) ? "Sí" : "No") . "\n";

    // Se invierte el orden de los colores de la bandera1.
    $bandera1->invertirColores();
    // Se muestra la bandera1 de nuevo para ver el cambio.
    $bandera1->mostrarBandera();

    // Se invierte la orientación de la bandera1 (de horizontal a vertical).
    $bandera1->invertirOrientacion();
    // Se muestra la bandera1 una última vez para ver el cambio final.
    $bandera1->mostrarBandera();
?>