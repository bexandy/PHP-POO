
function limpiar() {
document.form.reset();
document.form.titulo.focus();
}

function validar() {
  var form = document.form;
  if (form.titulo.value==0) {
    alert("Ingrese el título");
    form.titulo.value="";
    form.titulo.focus();
    return false;
  }

    if (form.des.value==0) {
    alert("Ingrese el Descripción");
    form.des.value="";
    form.des.focus();
    return false;
  }

  if (form.inicio.value==0) {
    alert("Ingrese la hora de inicio");
    form.inicio.value="";
    form.inicio.focus();
    return false;
  }

  if (form.termino.value==0) {
    alert("Ingrese la hora de término");
    form.termino.value="";
    form.termino.focus();
    return false;
  }

  form.submit();

}
