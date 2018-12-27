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
    	$array = [
    		'letterhead' => './mallletter/letterhead.png',
    		'ref_number' => 'SIFMSB/Ops/V091018-001/JC/AB/NewWorldPharmacy',
    		'date'=>'26/12/2018',
    		'to' => 'New World Pharmacy Sdn. Bhd.',
    		'add_line1' => 'LOT.10449, JALAN NENAS,',
    		'add_line2' => 'BATU 4 1/2 KAMPUNG JAWA KLANG',
    		'add_line3' => '41000 SELANGOR DARUL EHSAN',
    		'email1' => $user->email,
    		'email2' => 'name2@tenant.com',
    		'to_name' => $user->name,
    		'content' => 'test content',
    		'content_red' => 'red content test',
    	];
    	$html = view('letter', compact('array'))->render();
    	$dompdf = new Dompdf();
    	$dompdf->loadHtml($html);
    	$dompdf->setPaper('A4', 'potrait');
    	$dompdf->render();
    	$dompdf->stream('letter', array('Attachment'=>0));
    }
}
