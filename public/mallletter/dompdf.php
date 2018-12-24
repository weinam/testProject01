<?php 
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = file_get_contents('sample_letter.html');
$dompdf->loadHtml($html);
$dompdf->setPaper('letter', 'portrait'); 
$dompdf->render();
$dompdf->stream('mall_letter', array('Attachment' => 0));
 ?>