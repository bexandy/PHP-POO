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

function valida_registro() {
  var form = document.form;

  if (form.nom.value == 0) {
    alert("Ingrese su Nombre");
    form.nom.value="";
    form.nom.focus();
    return false;
  }

  if (form.correo.value == 0) {
    alert("Ingrese su E-Mail");
    form.correo.value="";
    form.correo.focus();
    return false;
  }

  if (validarEmail(form.correo.value) == false) {
    alert("El E-Mail ingresado no es correcto");
    form.correo.value="";
    form.correo.focus();
    return false;
  }

  if (form.login.value == 0) {
    alert("Ingrese su Login");
    form.login.value="";
    form.login.focus();
    return false;
  }

  if (form.pass.value == 0) {
    alert("Ingrese su Password");
    form.pass.value="";
    form.pass.focus();
    return false;
  }

    if (form.pass_1.value == 0) {
    alert("Repita su Password");
    form.pass_1.value="";
    form.pass_1.focus();
    return false;
  }

    if (form.pass.value != form.pass_1.value) {
    alert("Los password ingresados no coinciden");
    form.pass.value="";
    form.pass_1.value="";
    form.pass.focus();
    return false;
  }
  form.pass.value= md5(form.pass.value);
  form.submit();
}
