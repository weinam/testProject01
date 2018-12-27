<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "mallletter/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class DompdfController extends Controller
{
    public function index()
    {
    	$user = auth()->user();
		$date_ref = date('dmy');
		$date = date('d/m/Y');
		$company_name = 'PHILIP Sdn Bhd';
		$content = 'Someone asks you a question out of the blue, and you have no idea what he or she is talking about. Or, you have a sense, but know you need a little more information to answer well. Quickly email the sender back asking for context or the specific details you need.';
		$content_red = 'Fresh fruit and vegetables form an important part of a healthy diet.';
    	$array = [
    		'letterhead' => './mallletter/letterhead.png',
    		'ref_number' => 'SIFMSB/Ops/V'.$date_ref.'-'.$user->id.'/JC/AB/'.$company_name,
    		'date'=> $date,
    		'to' => $company_name,
    		'add_line1' => 'Blok A-00-08, Mutiara Perdana,',
    		'add_line2' => 'PJS 7/15, 47500 Subang Jaya,',
    		'add_line3' => 'Selangor, Malaysia',
    		'email1' => $user->email,
    		'email2' => $user->email,
    		'to_name' => $user->name,
    		'content' => $content,
    		'content_red' => $content_red,
    	];
    	$html = view('letter', compact('array'))->render();
    	$dompdf = new Dompdf();
    	$dompdf->loadHtml($html);
    	$dompdf->setPaper('A4', 'potrait');
    	$dompdf->render();
    	$dompdf->stream('letter', array('Attachment'=>0));
    }
}
