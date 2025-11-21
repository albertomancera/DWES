function marcarError(identificador){
    document.getElementById(identificador + 'Help').style.visibility="visible";
    document.getElementById(identificador).style.borderColor="red";
}

function limpiarError(identificador){
    document.getElementById(identificador + 'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor ="#DEE2E6";
}

function validarFormularioNotas(){
    var usuario = document.getElementById('usuario').value;
    var contrasenya = document.getElementById('contrasenya').value;

    var correcto = true;

    if(usuario.trim() == ""){
        marcarError('usuario');
        correcto = false;
    }

    if(contrasenya.trim() == ""){
        marcarError('contrasenya');
        correcto = false;
    }

    return correcto;
}

document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('formulario').addEventListener("submit",function(event){
        if(!validarFormularioNotas()){
            event.preventDefault();
        }
    });
});

document.getElementById('usuario').addEventListener("change", function(){
    limpiarError('usuario');
});

document.getElementById('contrasenya').addEventListener("change", function(){
    limpiarError('contrasenya');
});