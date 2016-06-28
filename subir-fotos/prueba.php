<?php
/*
$sujeto = "fotos/Foto-Bexandy-01.jpg";
$patrón = "/.*\.(.*)$/";
//preg_match($patrón, $sujeto, $coincidencias);
//
$coincidencias = preg_replace($patrón, "\\1", $sujeto);
print_r($coincidencias);
*/

// Fichero y nuevo tamaño
$nombre_fichero = 'fotos/Foto-Bexandy-01.jpg';
$porcentaje = 0.7;

// Tipo de contenido
header('Content-Type: image/jpeg');

// Obtener los nuevos tamaños
list($ancho, $alto) = getimagesize($nombre_fichero);
$nuevo_ancho = $ancho * $porcentaje;
$nuevo_alto = $alto * $porcentaje;

// Cargar
$thumb = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
$origen = imagecreatefromjpeg($nombre_fichero);

// Cambiar el tamaño
imagecopyresized($thumb, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

// Imprimir
imagejpeg($thumb);
?>
