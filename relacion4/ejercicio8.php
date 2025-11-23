<?php 
    class CuentaBancaria{

        private string $numeroCuenta;
        private string $nombreT;
        private float $saldo;
        private int $numOperaciones;

        public function __construct(string $numeroCuenta, string $nombreT){
            $this -> numeroCuenta = $numeroCuenta;
            $this  -> nombreT = $nombreT;
            $this-> saldo = 0.0;
            $this -> numOperaciones = 0;
        }

        public function __destruct(){}

        public function __toString(): string{
            return "Cuenta: {$this->numeroCuenta}, Titular: {$this->nombreT}, Saldo: {$this->saldo} €, Operaciones: {$this->numOperaciones}";
        }

        public function depositar(float $cantidad): void{
            $this -> saldo += $cantidad;
            $this->numOperaciones++;
        }

        public function extraer(float $cantidad): void{
            $this -> saldo -= $cantidad;
            $this->numOperaciones++;
        }

        public function transferir(CuentaBancaria $destino, float $cantidad): void{
            $this->extraer($cantidad);
            $destino->depositar($cantidad);
        }

        public function getSaldo(): float {
            return $this->saldo;
        }

        public function getNumOperaciones(): int {
            return $this->numOperaciones;
        }
    }
?>