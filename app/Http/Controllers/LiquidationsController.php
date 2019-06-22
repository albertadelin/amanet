<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liquidation;
use PDF;

class LiquidationsController extends Controller
{
    public function tableData()
    {
        $lichidare = Liquidation::all();
        return json_encode(['data' => $lichidare]);
    }

    public function generatePdf($id)
    {
        $lichidare = Liquidation::find($id);
        $data = ['data' => $lichidare];
        $pdf = PDF::loadView('lichidarePDF', $data);

        $pdfName = $lichidare->lichidare_id . "_" 
                    .str_replace(" ", "_", preg_replace('!\s+!', ' ', $lichidare->full_name)). "_" 
                    .date("Y/m/d").".pdf";

        return $pdf->download($pdfName);
    }

    public function index(){
        return view('lichidari');
    }

    
}
