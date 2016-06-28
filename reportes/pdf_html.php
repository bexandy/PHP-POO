<?php
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$html=
"
<html>
<body>
  Hola mundo
  <br>
  Visiten <strong>www.cesarcancino.com</strong>
</body>
</html>
";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("prueba");
?>


