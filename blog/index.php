<?php
require_once 'class/classConexionBlog.php';
$blogbdd = new BlogBDD;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>..:: Blog de Bexandy Rodríguez ::..</title>
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

            <?php
            if (isset($_GET["pos"])) {
              $inicio = $_GET["pos"];
            } else {
              $inicio = 0;
            }
            if (isset($_GET["cat"])) {
              $c = $_GET["cat"];
            } else {
              $c = 1;
            }
            $datos = $blogbdd->get_paginacion_noticias($inicio,$c);
            if (count($datos)==0){
              echo "<h2>No hay registros asociados a ésta categoría</h2>";
            } else {
              for ($i=0; $i < sizeof($datos) ; $i++) {
               ?>
               <div id="separador_post"></div>
               <div id="post">
                <div id="titulo_post">
                  <div id="titulo"><?php echo $datos[$i]["titulo"]; ?></div>
                  <div id="fecha"><?php echo $datos[$i]["fecha_cadena"]; ?> </div>
                </div>
                <div id="texto_post">
                  <hr>
                  <?php echo Conectar::corta_palabra($datos[$i]["detalle"],300); ?> ...
                </div>
                <div id="separador_debajo_texto"></div>
                <div id="debajo_post">
                  <div id="leer_mas">
                    <?php $texto = str_replace(" ","-",$datos[$i]["titulo"]); ?>
                    <a href="<?php echo $texto."-p".$datos[$i]["id_noticia"].".html"; ?>">Leer Más</a>
                  </div>
                  <div id="comentarios">Tiene <?php echo $blogbdd->total_comentarios($datos[$i]["id_noticia"]); ?> comentarios </div>
                </div>
                <div id="div_entre_post"></div>
              </div>
              <?php } } ?>
              <div id="div_paginacion_post">
                <hr>
                <?php
                if ($inicio == 0) {
                 ?>
                 Anteriores Publicaciones
                 <?php
               } else {
                $anterior = $inicio - 5;
                ?>
                <a href="?pos=<?php echo $anterior; ?>&cat=<?php echo $c ?>" title="Anteriores Publicaciones" >Anteriores Publicaciones</a>
                <?php
              }
              ?>

              &nbsp;&nbsp;||&nbsp;&nbsp;

              <?php
              if (count($datos)==5) {
                $proximo =$inicio + 5;
                ?>
                <a href="?pos=<?php echo $proximo; ?>&cat=<?php echo $c; ?>" title="Siguientes Publicaciones">Siguientes Publicaciones</a>
                <?php
              } else {
                ?>
                Siguientes Publicaciones
                <?php
              }
              ?>

            </div>
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
                 <div id="contenido_widget"><a href="?cat=<?php echo $categoria[$i]["id_categoria"] ?>" title="<?php echo $categoria[$i]["categoria"] ?>"><?php echo $categoria[$i]["categoria"]; ?></a></div>
                 <?php } ?>
               </div>
               <div class="separador_lateral_widget"></div>
             </div>


            <div id="separador_widget"></div>

             <div>
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=170&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=314376128644434" width="170" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>

            <div id="separador_widget"></div>

            <div id="widget">
              <div id="caja_widget">
                <div id="titulo_widget">Últimos Posts</div>
                <?php
                $not = $blogbdd->get_ultimos_5_posts();
                for ($i=0; $i < count($not); $i++) {
                 ?>
                 <div id="contenido_widget">
                   <?php $texto = str_replace(" ","-",$not[$i]["titulo"]); ?>
                   <a href="<?php echo $texto."-p".$not[$i]["id_noticia"].".html"; ?>"
                     title="<?php echo $not[$i]['titulo']; ?>" >
                     <?php echo Conectar::corta_palabra($not[$i]["titulo"],26); ?> ...
                   </a>
                 </div>
                 <?php } ?>
               </div>
               <div class="separador_lateral_widget"></div>
             </div>
           </div>
         </div>

         <div id="footer"></div>
         <div id="footer"><hr>&copy; Desarrollado por Bexandy Rodríguez 2015 - <?php echo date("Y"); ?></div>
       </div>

     </div>
   </center>
 </body>
 </html>

