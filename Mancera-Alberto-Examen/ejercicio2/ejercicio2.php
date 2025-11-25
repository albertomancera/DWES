<?php 
    class Pila{
        //Atributos privados
        private array $pila;
        private float $longitud;
        private int $elementos;

        //Constructor
        public function __construct(string $longitud){
            $this -> pila = []; //Inicializamos el array vacío
            $this -> longitud = $longitud;
            $this -> elementos = 0; //Inicializamos los elementos a 0
        }

        //Destructor
        public function __destruct(){}

        //Metodos  push (Añadir Elemento)
        public function push($item) {
        //Si elementos es mayor o igual al tamaño maximo, el metodo nos devuelve null
            if ($this->elementos >= $this->longitud) {
                return null; 
            }
            //Si no añadimos item a la pila, (que item es el parametro q el usuario nos tiene q pasar para añadirlo al array)
            $this->pila[] = $item;
            //Y incrementamos los elementos
            $this->elementos++;
        }

        //Metodo pop (Extraer Elemento)
        public function pop() {
        //Si elementos es igual a 0 (es decir está VACIO), el metodo nos devuelve null
            if ($this->elementos == 0) {
                return null; 
            }
            //Si no elementos se descrementa
            $this->elementos--;
            //Y utilizamos la funcion array_pop() para extraer un elemento de pila
            return array_pop($this->pila);
        }

        //Getter Elemento
        public function getElementos(): int{
            return $this->elementos;
        } 
        
        //Metodo To String
        public function __toString(){
            //Aquí paso el array a un string
            $pilaStr = implode(", ", $this->pila);
            return "Pila completa: {$pilaStr}";
        }

    }

    $pila = new Pila(10);
    echo "<h3>1) Pila de tamaño 10 creada</h3>";

    echo "2) Insertando 5 <br> ";
    echo ($pila->push(5) === null) ? "Pila llena<br>" : "Insertado<br>";

    echo "3) Insertando 3 <br>";
    echo ($pila->push(3) === null) ? "Pila llena <br>" : "Insertando <br>";

    echo "4) Mostrar el tamaño de la pila <br>";
    echo "El tamaño de la pila es ".  $pila -> getElementos() . "<br>";

    echo "5) Extraer un elemento <br>";
    echo ($pila->pop() === null) ? "Pila llena<br>" : "Extraido <br>";

    echo "6) Mostrar el tamaño de la pila <br>";
    echo "El tamaño de la pila es ".  $pila -> getElementos() . "<br>";

    echo "7) Mostrar la pila completa: <br> ";
    echo $pila;
    

?>