<?php
// Devuelve true si $num es primo, false si no lo es
    function isPrimo($num) {
        if ($num < 2) return false; // 0 y 1 no son primos
        for ($i = 2; $i <= sqrt($num); $i++) { // Solo hasta la raíz cuadrada
            if ($num % $i == 0) return false; // Si es divisible, no es primo
        }
        return true; // Si no se encontró divisor, es primo
    }   


    // Función iterativa: usa un bucle para calcular n!
    function factorial_iterativo($n) {
        if ($n < 0) return "No definido"; // para negativos no calculamos
        $f = 1; // acumulador
        for ($i = 2; $i <= $n; $i++) {
            $f *= $i; // multiplicar acumulador por cada i
        }
        return $f; // devolver resultado
    }

    // Función recursiva: definición matemática n! = n * (n-1)!
    function factorial_recursivo($n) {
        if ($n < 0) return "No definido"; // para negativos no calculamos
        if ($n == 0) return 1; // caso base: 0! = 1
        return $n * factorial_recursivo($n - 1); // llamada recursiva
    }

    // Euclides por división - Iterativa
// Mientras el segundo número no sea 0, reemplazamos (a,b) por (b, a % b).
function mcd_division_iterativa($a, $b) {
    // Normalizar a valores absolutos
    $a = abs((int)$a);
    $b = abs((int)$b);

    // Si alguno es 0, el MCD es el otro
    if ($a === 0) return $b;
    if ($b === 0) return $a;

    while ($b !== 0) {
        $r = $a % $b; // resto de la división
        $a = $b;      // desplazamos
        $b = $r;
    }
    return $a; // cuando b==0, a es el MCD
}


// Euclides por división - Recursiva
function mcd_division_recursiva($a, $b) {
    $a = abs((int)$a);
    $b = abs((int)$b);
    // Caso base: si b es 0, el resultado es a
    if ($b === 0) return $a;
    // Paso recursivo: gcd(b, a % b)
    return mcd_division_recursiva($b, $a % $b);
}


// Euclides por sustracción - Iterativa
// Repetimos restar el menor al mayor hasta que ambos sean iguales
function mcd_sustraccion_iterativa($a, $b) {
    $a = abs((int)$a);
    $b = abs((int)$b);

    if ($a === 0) return $b;
    if ($b === 0) return $a;

    // Mientras no sean iguales, restamos el menor del mayor
    while ($a !== $b) {
        if ($a > $b) {
            $a = $a - $b; // restar b de a
        } else {
            $b = $b - $a; // restar a de b
        }
    }
    // Cuando a == b, ese valor es el MCD
    return $a;
}

// Euclides por sustracción - Recursiva
function mcd_sustraccion_recursiva($a, $b) {
    $a = abs((int)$a);
    $b = abs((int)$b);

    if ($a === 0) return $b;
    if ($b === 0) return $a;
    if ($a === $b) return $a;
    if ($a > $b) {
        return mcd_sustraccion_recursiva($a - $b, $b);
    } else {
        return mcd_sustraccion_recursiva($a, $b - $a);
    }
}


function swap(&$var1, &$var2)
{
    // Guardar temporalmente el valor de la primera variable
    $temp = $var1;
    // Asignar a la primera variable el valor de la segunda
    $var1 = $var2;
    // Restablecer la segunda variable con el valor original de la primera
    $var2 = $temp;
}


function invertirArray(&$array){
    // Número de elementos del array
    $n = count($array);

    // Solo iteramos hasta la mitad (n/2). Cada iteración intercambia
    // el elemento en la posición $i con el de la posición simétrica
    // $n - $i - 1.
    for ($i = 0; $i < $n / 2; $i++) {
        // Usamos swap() para intercambiar por referencia los elementos
        swap($array[$i], $array[$n - $i - 1]);
    }
}

?>