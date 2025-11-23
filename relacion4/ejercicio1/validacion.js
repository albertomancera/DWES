/**
 * Muestra un mensaje de error para un campo específico del formulario.
 */
function marcarError(identificador){
    // Hace visible el elemento de ayuda (ej: 'usuarioHelp') que contiene el mensaje de error.
    document.getElementById(identificador + 'Help').style.visibility="visible";
    // Cambia el color del borde del campo de entrada a rojo para indicar un error.
    document.getElementById(identificador).style.borderColor="red";
}

/**
 * Limpia el mensaje de error de un campo específico.
 */
function limpiarError(identificador){
    // Oculta el elemento de ayuda que contiene el mensaje de error.
    document.getElementById(identificador + 'Help').style.visibility="hidden";
    // Restaura el color del borde del campo de entrada a su estado original.
    document.getElementById(identificador).style.borderColor ="#DEE2E6";
}

/**
 * Valida los campos del formulario de notas (en este caso, usuario y contraseña).
 */
function validarFormularioNotas(){
    // Obtiene el valor del campo de entrada con ID 'usuario'.
    var usuario = document.getElementById('usuario').value;
    // Obtiene el valor del campo de entrada con ID 'contrasenya'.
    var contrasenya = document.getElementById('contrasenya').value;

    // Inicializa una bandera para rastrear si la validación es exitosa.
    var correcto = true;

    // Comprueba si el campo 'usuario' está vacío (después de quitar espacios en blanco al inicio y al final).
    if(usuario.trim() == ""){
        // Si está vacío, marca el campo como erróneo.
        marcarError('usuario');
        // Cambia la bandera a 'false' porque se encontró un error.
        correcto = false;
    }

    // Comprueba si el campo 'contrasenya' está vacío.
    if(contrasenya.trim() == ""){
        // Si está vacío, marca el campo como erróneo.
        marcarError('contrasenya');
        // Cambia la bandera a 'false'.
        correcto = false;
    }

    // Devuelve el estado final de la validación.
    return correcto;
}

// Agrega un listener que se ejecuta cuando todo el contenido del DOM (la página HTML) ha sido cargado.
document.addEventListener('DOMContentLoaded', function(){
    // Selecciona el formulario por su ID y le añade un listener para el evento 'submit'.
    document.getElementById('formulario').addEventListener("submit",function(event){
        // Cuando se intenta enviar el formulario, primero se llama a la función de validación.
        if(!validarFormularioNotas()){
            // Si la validación falla (devuelve 'false'), se previene la acción por defecto,
            // que es enviar el formulario al servidor.
            event.preventDefault();
        }
    });
});

// Añade un listener al campo 'usuario' que se activa cuando su valor cambia y pierde el foco.
document.getElementById('usuario').addEventListener("change", function(){
    // Llama a la función para limpiar el error del campo 'usuario'.
    // Esto mejora la experiencia, ya que el error desaparece en cuanto el usuario lo corrige.
    limpiarError('usuario');
});

// Añade un listener similar al campo 'contrasenya'.
document.getElementById('contrasenya').addEventListener("change", function(){
    // Llama a la función para limpiar el error del campo 'contrasenya'.
    limpiarError('contrasenya');
});