<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17 - Relacion 4</title>
</head>

<body>
    <?php

    // 1. Se define un "trait" llamado Andaluz.
    // Un trait es un conjunto de métodos que pueden ser reutilizados en varias clases.
    // Es una forma de "copiar y pegar" código de manera organizada.
    trait Andaluz{
        // Define un método para saludar.
        public function saludar(){
            print "Que pasa";
        }

        // Define un método para despedirse.
        public function despedir(){
            print "Ta luego";
        }
    }

    // 2. Se define otro trait llamado Vasco.
    trait Vasco{
        // Define un método para saludar. ¡OJO! Tiene el mismo nombre que el método en el trait Andaluz.
        public function saludar(){
            print "Kaixo";
        }

        // Define un método para despedirse. También tiene el mismo nombre que en el trait Andaluz.
        public function despedir(){
            print "Agur";
        }
    }

    // 3. Se define la clase Persona.
    class Persona {
        // 4. Se indica que la clase Persona usará los métodos de los traits Andaluz y Vasco.
        // Como ambos traits tienen métodos con los mismos nombres (saludar y despedir),
        // se produce un conflicto que debemos resolver explícitamente.
        use Andaluz, Vasco {
            // 5. Resolución de conflictos con 'insteadof'.
            // Le decimos a PHP que, para el método 'saludar', queremos usar la implementación del trait Andaluz EN LUGAR DE la del trait Vasco.
            Andaluz::saludar insteadof Vasco;
            // Para el método 'despedir', queremos usar la implementación del trait Vasco EN LUGAR DE la del trait Andaluz.
            Vasco::despedir insteadof Andaluz;

            // 6. Creación de un alias con 'as'.
            // El método 'despedir' del trait Andaluz fue descartado por la regla 'insteadof' anterior.
            // Con 'as', podemos recuperarlo y darle un nuevo nombre (un alias) para poder usarlo.
            // Ahora, el método 'despedir' de Andaluz se puede llamar como 'decirAdios'.
            Andaluz::despedir as decirAdios;
        }
    }

    // 7. Se crea una nueva instancia (objeto) de la clase Persona.
    $person = new Persona();
    $person->saludar(); // Imprime "Que pasa", porque elegimos la versión de Andaluz.
    echo "<br>";
    $person->despedir(); // Imprime "Agur", porque elegimos la versión de Vasco.
    echo "<br>";
    $person->decirAdios(); // Imprime "Ta luego", porque es el alias que creamos para el 'despedir' de Andaluz.
    ?>
</body>

</html>