<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "mallletter/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class DompdfController extends Controller
{
    public function index()
    {
    	$dompdf = new Dompdf();
    	$html = file_get_contents('./mallletter/sample_letter.html');
    	$dompdf->loadHtml($html);
    	$dompdf->setPaper('A4', 'potrait');
    	$dompdf->render();
    	$dompdf->stream('letter', array('Attachment'=>0));
    }
}
