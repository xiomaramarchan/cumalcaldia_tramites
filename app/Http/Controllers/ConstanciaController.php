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

    

   

    public function samplePDF(Request $request)
    {

        //dd($request->cedula);

        //Constancia de trabajo del trabajador
        $datos_constancia = DB::table('empleados','empleado_nomina')
        ->select('empleados.cedula', 'empleados.nombres', 'empleados.apellidos')
        ->leftJoin('empleado_nomina', 'empleado_nomina.cedula', '=', 'empleados.cedula')
        ->where('empleados.cedula','=', '15249486')
        ->get();        
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';
      

        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output('SamplePDF.pdf');
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

