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
        $nominas=DB::table('nominas')->get();
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
        ->get();  
        
        dd($datos_constancia);
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';
      

        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output('Constancia.pdf');
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

