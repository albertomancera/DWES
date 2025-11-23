<?php 
    // Define una clase abstracta 'CuentaBancaria'. No se pueden crear objetos directamente de esta clase, sirve como plantilla.
    abstract class CuentaBancaria {
        // Propiedades protegidas, accesibles desde esta clase y las clases que hereden de ella.
        protected string $numeroCuenta; // Almacena el número de cuenta.
        protected string $nombreT;      // Almacena el nombre del titular.
        protected float $saldo;          // Almacena el saldo actual de la cuenta.
        protected int $numOperaciones;   // Contador del número de operaciones realizadas.

        // Constructor de la clase. Se ejecuta al crear un nuevo objeto de una clase hija.
        public function __construct(string $numeroCuenta, string $nombreT) {
            $this->numeroCuenta = $numeroCuenta; // Inicializa el número de cuenta.
            $this->nombreT = $nombreT;           // Inicializa el nombre del titular.
            $this->saldo = 0.0;                  // Inicializa el saldo a 0.
            $this->numOperaciones = 0;           // Inicializa el contador de operaciones a 0.
        }

        // Destructor de la clase. Se ejecuta cuando el objeto es destruido. Aquí está vacío.
        public function __destruct() {}

        // Método mágico __toString. Define cómo se debe representar el objeto como una cadena de texto.
        public function __toString(): string {
            // Devuelve una cadena formateada con los detalles de la cuenta.
            return "Cuenta: {$this->numeroCuenta}, Titular: {$this->nombreT}, Saldo: {$this->saldo} €, Operaciones: {$this->numOperaciones}";
        }

        // Método para depositar dinero en la cuenta.
        public function depositar(float $cantidad): void {
            $this->saldo += $cantidad; // Aumenta el saldo con la cantidad depositada.
            $this->numOperaciones++;   // Incrementa el contador de operaciones.
        }

        // Método abstracto para extraer dinero. Las clases hijas DEBEN implementar este método.
        abstract public function extraer(float $cantidad): bool;

        // Método para transferir dinero a otra cuenta.
        public function transferir(CuentaBancaria $destino, float $cantidad): bool {
            // Intenta extraer la cantidad de la cuenta actual.
            if ($this->extraer($cantidad)) {
                // Si la extracción es exitosa, deposita la cantidad en la cuenta de destino.
                $destino->depositar($cantidad);
                return true; // Devuelve true para indicar que la transferencia fue exitosa.
            }
            return false; // Devuelve false si la extracción falló.
        }

        // Método para obtener el saldo actual.
        public function getSaldo(): float {
            return $this->saldo;
        }

        // Método para obtener el número de operaciones.
        public function getNumOperaciones(): int {
            return $this->numOperaciones;
        }
    }

    // Clase 'CuentaDebito' que hereda de 'CuentaBancaria'.
    class CuentaDebito extends CuentaBancaria {
        // Implementación del método abstracto 'extraer' para una cuenta de débito.
        public function extraer(float $cantidad): bool {
            // Solo se puede extraer si la cantidad es menor o igual al saldo disponible.
            if ($cantidad <= $this->saldo) {
                $this->saldo -= $cantidad; // Resta la cantidad del saldo.
                $this->numOperaciones++;   // Incrementa el contador de operaciones.
                return true; // La extracción fue exitosa.
            }
            return false; // No hay saldo suficiente.
        }
    }

    // Clase 'CuentaCredito' que hereda de 'CuentaBancaria'.
    class CuentaCredito extends CuentaBancaria {
        private float $limiteCredito; // Límite de crédito que permite tener saldo negativo.

        // Constructor específico para la cuenta de crédito.
        public function __construct(string $numeroCuenta, string $nombreT, float $limiteCredito) {
            // Llama al constructor de la clase padre ('CuentaBancaria') para inicializar las propiedades comunes.
            parent::__construct($numeroCuenta, $nombreT);
            // Inicializa la propiedad específica de esta clase.
            $this->limiteCredito = $limiteCredito;
        }

        // Implementación del método abstracto 'extraer' para una cuenta de crédito.
        public function extraer(float $cantidad): bool {
            // Comprueba si la extracción no supera el saldo más el límite de crédito.
            if (($this->saldo - $cantidad) >= -$this->limiteCredito) {
                $this->saldo -= $cantidad; // Resta la cantidad del saldo (puede quedar negativo).
                $this->numOperaciones++;
                return true; // La extracción fue exitosa.
            }
            return false; // La extracción supera el límite de crédito.
        }
    }

    // --- CÓDIGO DE PRUEBA ---

    // Crear una instancia de CuentaDebito.
    $cuentaDeDebito = new CuentaDebito("ES111", "Pepe");
    // Crear una instancia de CuentaCredito con un límite de 500.
    $cuentaDeCredito = new CuentaCredito("ES222", "Lucía", 500);

    // Muestra el estado inicial de las cuentas.
    echo $cuentaDeDebito . "\n";
    echo $cuentaDeCredito . "\n";

    // Realizar depósitos en ambas cuentas.
    $cuentaDeDebito->depositar(300);
    $cuentaDeCredito->depositar(200);

    // Muestra el estado después de los depósitos.
    echo $cuentaDeDebito . "\n";
    echo $cuentaDeCredito . "\n";

    // Pruebas de extracción en la cuenta de débito.
    // Intenta extraer 200 (debería ser OK, saldo restante 100).
    echo "Extracción débito (200): " . ($cuentaDeDebito->extraer(200) ? "OK" : "Fallo") . "\n";
    // Intenta extraer 200 más (debería fallar, solo quedan 100).
    echo "Extracción débito (200 más): " . ($cuentaDeDebito->extraer(200) ? "OK" : "Fallo") . "\n";

    // Pruebas de extracción en la cuenta de crédito.
    // Intenta extraer 600 (debería ser OK, saldo restante -400, dentro del límite de -500).
    echo "Extracción crédito (600): " . ($cuentaDeCredito->extraer(600) ? "OK" : "Fallo") . "\n";
    // Intenta extraer 200 más (debería fallar, saldo sería -600, superando el límite de -500).
    echo "Extracción crédito (200 más): " . ($cuentaDeCredito->extraer(200) ? "OK" : "Fallo") . "\n";

    // Muestra el estado después de las extracciones.
    echo $cuentaDeDebito . "\n";
    echo $cuentaDeCredito . "\n";

    // Prueba de transferencia desde la cuenta de débito a la de crédito.
    // La cuenta de débito tiene 100, así que la transferencia de 50 es posible.
    echo "Transferencia de débito a crédito (50): " . ($cuentaDeDebito->transferir($cuentaDeCredito, 50) ? "OK" : "Fallo") . "\n";

    // Muestra el estado final de las cuentas después de la transferencia.
    echo $cuentaDeDebito . "\n";
    echo $cuentaDeCredito . "\n";
?>