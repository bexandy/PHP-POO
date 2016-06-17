function validarEmail( email ) {
  expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if ( expr.test(email) ){
    return true;
  }else{
    return false;
  }
}

function limpiar_logueo() {
  document.form.reset();
  document.form.user.focus();
}

function validar_logueo() {

  var form = document.form;

  if (form.user.value == 0) {
    alert("Ingrese su Login");
    form.user.value="";
    form.user.focus();
    return false;
  }

  if (form.pass.value == 0) {
    alert("Ingrese su Password");
    form.pass.value="";
    form.pass.focus();
    return false;
  }

form.pass.value= md5(form.pass.value);
form.submit();

}
