<?php
session_start();
//session_unregister("session_reg_usuario"); //función eliminada a partir de php 5.4
session_unset("session_reg_usuario");
session_destroy();
//devuelvo al usuario al formulario
header("Location: index.php");
 ?>
