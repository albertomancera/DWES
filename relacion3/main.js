function formLowerUpper() {
    document.getElementById("checkbox1").hidden = true;
    document.getElementById("mayusMinus").hidden = false;
    document.getElementById("tipo").value = "form1";
}

function formLowerOrUpper() {
    document.getElementById("checkbox1").hidden = false;
    document.getElementById("mayusMinus").hidden = true;
    document.getElementById("tipo").value = "form2";
}
