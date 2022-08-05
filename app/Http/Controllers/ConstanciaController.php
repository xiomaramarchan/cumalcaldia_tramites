<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Models\Nomina;
use Illuminate\Support\Facades\DB;

class ConstanciaController extends Controller
{
    //
    public function index(){
        $nominas=Nomina::all();
    	return view('tramites.constancia', ['nominas' => $nominas]);
    }

    

   

    public function ConstanciaPdf(Request $request)
    {

        

        
        //Constancia de trabajo del trabajador
        $datos_constancia = DB::table('empleados')
        ->select('empleados.*', 'empleado_nominas.*', 'nominas.*')
        ->join('empleado_nominas', 'empleado_nominas.empleado_cedula', '=', 'empleados.cedula')
        ->join('nominas', 'nominas.codigo', '=', 'empleado_nominas.nomina_codigo')
        ->where('empleados.cedula','=', $request->cedula)
        ->where('nominas.codigo','=', $request->nomina)
        ->get(); 

        $filename = 'hello_world.pdf';

       
        $view = \View::make('tramites.generar_constancia_pdf')->with(compact('datos_constancia'));  
        $html = $view->render();

    	PDF::setHeaderCallback(function($pdf) {

            // Set font
            

            $pdf->SetY(15);
            $pdf->SetFont('helvetica', 'B', 20);
            // Title
            $pdf->Cell(0, 15, 'Something new right here!!!', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    
        });

        // Custom Footer
        PDF::setFooterCallback(function($pdf) {

            // Position at 15 mm from bottom
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });
        
        PDF::SetTitle('Hello World');
        PDF::AddPage('P', 'A4');
        

        //PDF::SetAuthor('System');
        PDF::SetTitle('Constancia de trabajo');
        PDF::SetSubject('Generado por sistema');
        PDF::SetMargins(7, 18, 7);
        PDF::SetFontSubsetting(false);
        PDF::SetFontSize('12px');   
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);     

        



        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));      
        
        
    }


    public function savePDF()
    {    
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';
      

        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(public_path(uniqid().'_SamplePDF.pdf'), 'F');
    }

    public function downloadPDF()
    {    
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';
      

        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(uniqid().'_SamplePDF.pdf', 'D');
    }


    public function HtmlToPDF()
    {    
        $view = \View::make('HtmlToPDF');
        $html_content = $view->render();
      

        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(uniqid().'_SamplePDF.pdf');
    }
}

