<?php 
    // Se define una interfaz llamada Encendible.
    // Una interfaz es un contrato que obliga a las clases que la implementen a definir los métodos que contiene.
    interface Encendible{
        // Método que deberá ser implementado para encender el objeto.
        public function encender();
        // Método que deberá ser implementado para apagar el objeto.
        public function apagar();
    }

    // Se define la clase Bombilla, que implementa la interfaz Encendible.
    class Bombilla implements Encendible{
        // Propiedades privadas de la clase Bombilla.
        private string $tipoBombilla;
        private int $lumenes;
        private bool $encendida;

        // Constructor de la clase. Se ejecuta al crear un nuevo objeto Bombilla.
        public function __construct(string $tipoBombilla, int $lumenes)
        {
            // Asigna los valores recibidos a las propiedades del objeto.
            $this -> tipoBombilla = $tipoBombilla;
            $this -> lumenes = $lumenes;
            // Inicializa la bombilla como apagada por defecto.
            $this-> encendida =false;
        }

        // Destructor de la clase. Se ejecuta cuando el objeto es destruido.
        public function __destruct()
        {
            // Muestra un mensaje indicando que la bombilla ha sido eliminada.
            echo "La bombilla de tipo {$this->tipoBombilla} ha sido eliminada. \n";
        }

        // Implementación del método encender de la interfaz Encendible.
        public function encender(){
            // Cambia el estado de la propiedad 'encendida' a verdadero.
            $this->encendida = true;
            echo "Bombilla encendida. \n";
        }

        // Implementación del método apagar de la interfaz Encendible.
        public function apagar() {
            // Cambia el estado de la propiedad 'encendida' a falso.
            $this->encendida = false;
            echo "Bombilla apagada.\n";
        }
    }

    // Se define la clase Motocicleta, que también implementa la interfaz Encendible.
    class Motocicleta implements Encendible{
        // Propiedades privadas de la clase Motocicleta.
        private float $gasolina;
        private int $bateria;
        private string $matricula;
        private bool $estado;

        // Constructor de la clase. Se ejecuta al crear un nuevo objeto Motocicleta.
        public function __construct(string $matricula)
        {
            // Inicializa las propiedades con valores por defecto.
            $this-> gasolina = 0;
            $this-> bateria = 2;
            $this->estado = false;
            $this->matricula = $matricula;
        }

        // Método para añadir gasolina a la moto.
        public function cargarGasolina(float $cantidad){
            $this-> gasolina += $cantidad;
            echo "Moto cargada con ", $cantidad, " litros. \n";
        }

        // Implementación del método encender de la interfaz Encendible.
        public function encender() {
            // Comprueba si la moto ya está encendida, o si no tiene batería o gasolina.
            if ($this->estado == true or $this->bateria <= 0 or $this->gasolina <= 0){
                echo "Error, la moto no cumple las condiciones para poder arrancar.\n";
            } else {
                // Si las condiciones son correctas, enciende la moto.
                $this->estado = true;
                echo "Moto encendida.\n";
            }
        }

        // Implementación del método apagar de la interfaz Encendible.
        public function apagar() {
            // Comprueba si la moto ya está apagada.
            if ($this->estado == false){
                echo "Error, la moto se encuentra apagada.\n";
            } else {
                // Si está encendida, la apaga.
                $this->estado = false;
                echo "Moto apagada.\n";
            }
        }
    }

    // Función que acepta cualquier objeto que implemente la interfaz Encendible.
    function enciende_algo (Encendible $algo) {
        // Llama al método encender() del objeto recibido, sin importar si es una Bombilla o una Motocicleta.
        $algo->encender();
    }

    // Se crea una nueva instancia (objeto) de la clase Bombilla.
    $miBombilla = new Bombilla("led",12);
    // Se crea una nueva instancia (objeto) de la clase Motocicleta.
    $miMoto = new Motocicleta("2134 BMW");
    // Se llama a la función enciende_algo() pasándole el objeto Bombilla.
    enciende_algo($miBombilla);
    // Se llama a la función enciende_algo() pasándole el objeto Motocicleta.
    // La moto no encenderá porque no tiene gasolina.
    enciende_algo($miMoto);
?>
