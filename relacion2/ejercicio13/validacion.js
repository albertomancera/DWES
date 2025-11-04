/*****************************************************
 * 
 * Validaciones para el formulario del ejercicio 12
 * creado por Pilar González el día ----
 * Versión 1
 * 
 */

// añadimos un eventListener al formulario, para que se dispare la ejecución de las validaciones
// otra opción hubiera sido, en el archivo 12formulario.php, poner dentro de la etiqueta <form>
// el evento onsubmit y la invocación de una función con nombre js, pero eso "emborrona" el código
// html, por lo que se prefiere manipular el evento directamente desde js

    function validarForm() {    // frenamos el envio al action que es el comport. por defecto del botón submit...
                          // así podemos examinar el valor de cada campo antes de enviar
    var nota1 = parseFloat(document.getElementById('nota1').value);
    var nota2 = parseFloat(document.getElementById('nota2').value);
    // deben ser enteros, numéricos, entre 1 y 10 y tener algo ^^^^
    var faltas = parseFloat(document.getElementById('faltas').value);
    // igual que las notas, salvo que puede ser 0 ^^^^
    var nombre = document.getElementById('nombre').value;
    // no debe estar vacío, es requerido ^^^^
    var email = document.getElementById('email').value;
    // debe tener el formato de un email (por ahora no lo hemos resuelto)

    var correcto = true; // hipótesis inicial, esta variable, si cambia a false es por encontrar un error

    if ((!Number.isInteger(nota1))||(nota1<1)||(nota1>10)){
        marcarError('nota1');  // le paso el id de este campo a una función y señala en rojo y muestra error
        correcto = false;
    }

    if ((!Number.isInteger(nota2))||(nota2<1)||(nota2>10)){
        marcarError('nota2');  // le paso el id de este campo a una función y señala en rojo y muestra error
        correcto = false;
    }

    if ((!Number.isInteger(faltas))||(faltas<0)){
        marcarError('faltas');  // le paso el id de este campo a una función y señala en rojo y muestra error
        correcto = false;
    }
    
    // y para nota2 y faltas y ...
    if (nombre.trim()==""){
        marcarError('nombre');  // le paso el id de este campo a una función y señala en rojo y muestra error
        correcto = false;
    }

    return correcto;
    
}


// estas dos funciones se crean refactorizando el código de validación, y por
// modularidad. En lugar de repetirse por cada campo, se parametriza
// una función que o marcaError (señaliza error), o limpiaError
// observese que para acceder a una característica de estilo, se utiliza
// el mismo nombre que tenía en CSS, pero juntando las palabras, quitando
// el guión intermedio, y utilizando el lowerCamelCase como nomenclatura
// asi border-color pasa a ser borderColor

function marcarError(identificador){
    document.getElementById(identificador+'Help').style.visibility="visible";
    document.getElementById(identificador).style.borderColor="red";
}

function limpiarError(identificador){
    document.getElementById(identificador+'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor="#dee2e6";
}