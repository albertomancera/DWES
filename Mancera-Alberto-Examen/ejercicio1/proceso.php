<?php
    //Solo se ejecuta si el formulario ha sido enviado mediante GET
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $frase = htmlspecialchars($_GET['cadena1'] ?? '');
        $caracteres = htmlspecialchars($_GET['cadena2'] ?? '');

        //Si frase o caracteres es = "" (No esta relleno) nos salta un aviso y nos saca del programa
        if($frase === '' || $caracteres === ''){
            echo "<div class='alert alert-success text-center> Faltan datos.</div>";
            exit;
        }

        function estanIncluidos(string $frase ,string  $caracteres,bool $caseSensitive =  true): bool{
            /*Si caseSensitive es diferente a caseSensitive (Es decir es false) 
            Nos pasa la frase y los caracteres a minuscula mediante la funcion strolower()
            */
            if(!$caseSensitive){
                $frase = strtolower($frase);
                $caracteres = strtolower($frase);
            }

            //Inicializamos i = 0, mientras que i sea menor que la longitud de caracteres, i se incrementa
            for ($i = 0; $i < strlen($caracteres); $i++) {
                //Si buscamos los caracteres 1 a 1 en la frase y es igual a False, devolvemos false
                if (strpos($frase, $caracteres[$i]) === false) {
                    return false;
                }
            }
            return true;

        }

    echo "<h2 class='text-center text-primary mb-4'>Resultados: </h2>";
    echo "<p>Sensible a mayusculas o minusculas ";
    echo estanIncluidos($frase, $caracteres) ? "True" : "False";
    echo "</p>";

    echo "<p>No sensible a mayúsculas ni a minúsculas  ";
    echo estanIncluidos($frase, $caracteres, false) ? "True" : "False";
    echo "</p>";

    echo "<div class='text-center mt-4'>
            <a  href='/Mancera-Alberto-Examen/ejercicio1/formulario.php' class='btn btn-primary'>Volver al formulario</a>
            </div>";
    }
?>