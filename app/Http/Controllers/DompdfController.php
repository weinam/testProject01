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
    	$html = asset('mallletter/sample_letter.html');
    	$test = file_get_contents($html);
    	dd($test);
    	$dompdf->loadHtml('<h1>Ready</h1>');
    	$dompdf->setPaper('A4', 'potrait');
    	$dompdf->render();
    	$dompdf->stream('letter', array('Attachment'=>0));
    }
}
