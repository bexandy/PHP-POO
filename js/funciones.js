// Desarrollado por Bexandy Rodriguez
function limpiar() {
  document.form.reset();
  document.form.nom.focus();
}

function validar() { // funcion para validar campos no vacios


var form = document.form; //guardo el formulario en una variable
  //
  if (form.nom.value==0) {  //pregunto si el input esta vacio
    window.alert("Ingrese su nombre");
    form.nom.value="";
    form.nom.focus();
    return false;
  }
  if (form.texto.value==0) { //pregunto si la caja de texto esta vacia
    alert("Ingrese su Mensaje");
    form.texto.value="";
    form.texto.focus();
    return false;
  }
  form.submit();
}

//funcion para cambiar el color del fondo del elemento id (se llama desde OnMouseMove y onMouseOut)
function tr(id,color) {
  document.getElementById(id).style.backgroundColor=color;
}

//funcion para confirmar que desea eliminar un registro, si acepta redirecciona a url
function eliminar(url) {
  if (confirm("Está seguro de que desea eliminar el comentario?"))  {
    window.location=url;
}
}
