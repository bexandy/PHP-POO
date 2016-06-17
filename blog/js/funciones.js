function valida_comentarios() {
//alert("hola");
var form=document.form;

function validarEmail( email ) {
  expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if ( expr.test(email) ){
    return true;
  }else{
    return false;
  }
}

if (form.nom.value == 0) {
  document.getElementById("valor").innerHTML="<font color='#ff0000'>El nombre está vacío</font>";
  form.nom.value="";
  form.nom.focus();
  return false;
} else {
  document.getElementById("valor").innerHTML="";
}

if (form.correo.value == 0) {
  document.getElementById("valor").innerHTML="<font color='#ff0000'>El E-mail está vacío</font>";
  form.correo.value="";
  form.correo.focus();
  return false;
} else {
  document.getElementById("valor").innerHTML="";
}

if (validarEmail(form.correo.value) == false) {
  document.getElementById("valor").innerHTML="<font color='#ff0000'>El E-mail es inválido</font>";
  form.correo.value="";
  form.correo.focus();
  return false;
} else {
  document.getElementById("valor").innerHTML="";
}

if (form.mensaje.value == 0) {
  document.getElementById("valor").innerHTML="<font color='#ff0000'>El mensaje está vacío</font>";
  form.mensaje.value="";
  form.mensaje.focus();
  return false;
} else {
  document.getElementById("valor").innerHTML="";
}

form.url.value=location.href;
form.submit() ;

}



