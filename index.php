<?php
require_once 'class/classConexionBlog.php';
$blogbdd = new BlogBDD;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author"  content="Bexandy Rodríguez">
  <meta name="description" content="Blog Personal realizado con PHP">
  <meta name="keywords" content="Blog Personal,PHP,Programación Orientada a Objetos">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>..:: Blog de Bexandy Rodríguez ::..</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css" >
</head>
<body>
  <center>
    <div id="principal">
      <div id="header">header</div>
      <div id="main">

        <div id="menu">
          <?php include 'menu.php'; ?>

          <div id="buscador">
            <form name="buscar">
              <input type="text" name="s" style="width: 150px;">
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

