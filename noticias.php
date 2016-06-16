<?php
require_once 'class/classConexionBlog.php';
$blogbdd = new BlogBDD;
$datos = $blogbdd->get_post_por_id();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author"  content="Bexandy Rodríguez">
  <meta name="description" content="Blog Personal realizado con PHP">
  <meta name="keywords" content="Blog Personal,PHP,Programación Orientada a Objetos">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>..:: <?php echo $datos[0]["titulo"]; ?> ::..</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css" >
</head>
<body>
  <center>
    <div id="principal">
      <div id="header">
        <div style="float:left; text-align: left;">
          <img src="images/Bexandy-Rodriguez.jpg" height="100px" alt="Logo">
        </div>

        <h1>..:: Blog de Bexandy Rodríguez ::..</h1>

      </div>
      <div id="main">

        <div id="menu">
          <?php include 'menu.php'; ?>

          <div id="buscador">
            <form name="buscar">
              <input type="text" name="s" style="width: 140px;">
              <a href=""><img src="images/search32.png" alt="Buscar" style="width: 20px; height: 20px;"></a>
            </form>
          </div>

        </div>

        <div id="content">
          <div id="contenedor">
            <!--***********detalle post*********-->

            <div id="div_post_top"></div>
            <div id="div_post_contenedor">
              <div id="div_post_titulo">
                <div id="div_post_titulo_texto"><?php echo $datos[0]["titulo"]; ?></div>
                <div id="div_post_titulo_fecha"><?php echo $datos[0]["fecha_cadena"]; ?></div>
              </div>

              <div id="div_post_separador_debajo_titulo"></div>
              <div id="div_post_contenedor_detalle">
                <div class="div_separador_detalle_post"></div>
                <div id="div_detalle_post">
                  <?php echo $datos[0]["detalle"]; ?>
                  <hr>
                  <?php echo $datos[0]["html"]; ?>
                  <hr>
                  <div id="div_contenedor_categoria_y_descarga">
                    <div id="div_categoria_post">Categoría: PHP</div>
                    <div id="div_descarga_post"><a href="<?php echo $datos[0]["descarga"]; ?>"><img src="images/Drive Download.png" alt="Descargar" title="Descargar" height="48px" border="0" ></a></div>
                  </div>

                  <div id="div_form_comentarios">
                    <hr>
                    <form name="form" action="" method="post" >
                      Nombre:<input type="text" name="nom" >
                      <br>
                      Email:<input type="text" name="correo" >(no será publicado)
                      <br>
                      Sitio Web:<input type="text" name="web" >
                      <br>
                      Mensaje:<textarea name="mensaje" cols="40" rows="10"></textarea>
                      <br>
                      <br>
                      <button type="button" value="Comentar" title="Comentar" onclick="">Comentar</button>
                    </form>
                  </div>

                  <div id="div_comentarios_post">
                    <hr>
                    <strong>Comentarios:</strong>
                    <ul>
                      <?php for ($i=0; $i < 5; $i++) {
                        ?>
                        <li>
                          Claudio dice:
                          <br>
                          hola me gustó este post
                          <hr>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>

                  <div class="div_separador_detalle_post"></div>
                </div>
              </div>

              <!--***********detalle post*********-->
            </div>

            <div id="sidebar">

              <div id="separador_widget"></div>
              <div id="widget">
                <div id="caja_widget">
                  <div id="titulo_widget">Categorías</div>
                  <?php
                  $categoria = $blogbdd->get_categorias();
                  for ($i=0; $i < sizeof($categoria); $i++) {
                   ?>
                   <div id="contenido_widget">
                     <a href="http://php-poo.local/?cat=<?php echo $categoria[$i]["id_categoria"]; ?>" title="<?php echo $categoria[$i]["categoria"]; ?>" ><?php echo $categoria[$i]["categoria"]; ?></a>
                   </div>
                   <?php } ?>
                 </div>
                 <div class="separador_lateral_widget"></div>
               </div>

               <div id="separador_widget"></div>
               <div id="widget">
                <div id="caja_widget">
                  <div id="titulo_widget">Últimas Entradas</div>
                  <?php for ($i=0; $i < 5; $i++) {
                   ?>
                   <div id="contenido_widget">PHP</div>
                   <?php } ?>
                 </div>
                 <div class="separador_lateral_widget"></div>
               </div>

             </div>

             <div id="footer"></div>
             <div id="footer"><hr>&copy; Desarrollado por Bexandy Rodríguez 2015 - <?php echo date("Y"); ?></div>
           </div>

         </div>
       </center>
     </body>
     </html>


