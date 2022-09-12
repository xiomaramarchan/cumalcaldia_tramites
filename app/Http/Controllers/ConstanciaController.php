<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Models\Nomina;
use Illuminate\Support\Facades\DB;
//header("Content-Type: text/html;charset=utf-8");

class ConstanciaController extends Controller
{
    //
    public function index(){
        $nominas=Nomina::all();
    	return view('tramites.constancia', ['nominas' => $nominas]);
    }
   

    public function ConstanciaPdf(Request $request)
    {
        if($request->tipo_const=='SB') {
            //Constancia de trabajo del trabajador
            $datos_constancia = DB::table('empleados')
            ->select('empleados.*', 'empleado_nominas.*', 'empleado_nominas.sueldo_base as sueldo', 'nominas.*')
            ->join('empleado_nominas', 'empleado_nominas.empleado_cedula', '=', 'empleados.cedula')
            ->join('nominas', 'nominas.codigo', '=', 'empleado_nominas.nomina_codigo')
            ->where('empleados.cedula','=', $request->cedula)
            ->where('nominas.codigo','=', $request->nomina)
            ->get();
            $datos_constancia[0]->tipoSueldo='SB';
        }
        else{
            //Constancia de trabajo del trabajador
            $datos_constancia = DB::table('empleados')
            ->select('empleados.*', 'empleado_nominas.*', 'empleado_nominas.sueldo_integral as sueldo', 'nominas.*')
            ->join('empleado_nominas', 'empleado_nominas.empleado_cedula', '=', 'empleados.cedula')
            ->join('nominas', 'nominas.codigo', '=', 'empleado_nominas.nomina_codigo')
            ->where('empleados.cedula','=', $request->cedula)
            ->where('nominas.codigo','=', $request->nomina)
            ->get();
            $datos_constancia[0]->tipoSueldo='SI';
        }
        
        $filename = 'hello_world.pdf';

       
        $view = \View::make('tramites.generar_constancia_pdf')->with(compact('datos_constancia'));  
        $html = $view->render();
       

    	PDF::setHeaderCallback(function($pdf) {

            //$pdf->Image('../../../public/img/escudo', 0, 10, 50, 50, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
            //$pdf->Image('../../../public/img/LogoAlcaldia', 100, 10, 50, 50, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
            // Set font
              // Title

            $pdf->SetY(19);
            $pdf->SetFont('helvetica', '', 11);
            $pdf->Cell(0,10, 'REPÚBLICA BOLIVARIANA DE VENEZUELA', 0, false, 'C', 0, '', 0, false, 'M', 'M');
           
            $pdf->SetFont('helvetica', '', 11); 
            $pdf->SetY(23);
            $pdf->Cell(0,11, 'ALCALDÍA BOLIVARIANA DEL MUNICIPIO SUCRE', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            
            $pdf->SetFont('helvetica', '', 11);
            $pdf->SetY(27);
            $pdf->Cell(0,11, 'DIRECCIÓN DEL PODER MUNICIPAL DE TALENTO HUMANO', 0, false, 'C', 0, '', 0, false, 'M', 'M');
           
            $pdf->SetFont('helvetica', '', 11);
            $pdf->SetY(31);
            $pdf->Cell(0,11, 'CUMANÁ ESTADO SUCRE', 0, false, 'C', 0, '', 0, false, 'M', 'M');
           
            $pdf->SetFont('helvetica', '', 8);
            $pdf->SetY(34);
            $pdf->Cell(0,8, '"COORDINACIÓN DE BIENESTAR SOCIAL"', 0, false, 'C', 0, '', 0, false, 'M', 'M');
           
            $pdf->SetFont('helvetica', '', 8);
            $pdf->SetY(38);
            $pdf->Cell(0,8,'RIF:G-20000539-4', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->SetY(55);
            $pdf->Cell(0,12, 'CONSTANCIA', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            

        });
        
        // Custom Footer
        PDF::setFooterCallback(function($pdf) {

            $datos_director = DB::table('director')
            ->select('director.*')
            ->get();

            //-------------------------Fecha en formato de barras---------------------------//
        
          $fecha_nombramientoo = date("d/m/Y", strtotime($datos_director[0]->fecha_nombramiento));
          
          //----------------------------------------------------------------------------------------//
          
 
            $pdf->SetXY(20,220);
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0,12, $datos_director[0]->titulo_academico.'. '.$datos_director[0]->nombres.' '.$datos_director[0]->apellidos, 0, false, 'C', 0, '', 0, false, 'M', 'M');
          
            $pdf->SetXY(20,230);
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0,12, $datos_director[0]->cargo, 0, false, 'C', 0, '', 0, false, 'M', 'M');
          
            $pdf->SetXY(20,240);
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0,12, $datos_director[0]->resolucion.' de Fecha '.$fecha_nombramientoo, 0, false, 'C', 0, '', 0, false, 'M', 'M');
          
            $pdf->SetXY(20,250);
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0,12, $datos_director[0]->otro, 0, false, 'C', 0, '', 0, false, 'M', 'M');
          

            $pdf->SetXY(20,265);
            // Set font
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0,12, $datos_director[0]->firma, 0, false, 'L', 0, '', 0, false, 'M', 'M');
          

            // Position at 15 mm from bottom
            $pdf->SetXY(20,280);
            // Set font
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->Cell(0,12, 'Nota: Valida por seis (6) meses', 0, false, 'L', 0, '', 0, false, 'M', 'M');
            
            $pdf->SetXY(20,285);
            $pdf->SetFont('helvetica', 'I', 9);
            $pdf->Cell(0,9, 'Avenida Universidad, sector Los Uveros, Cumaná - Estado Sucre. Tlf: 0293-9952425', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            // Page number
            //$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });
        
       // PDF::AddPage('P', 'A4');
        PDF::AddPage();
        PDF::SetTitle('Constancia de trabajo');
        PDF::SetSubject('Generado por sistema');
        PDF::SetMargins(20, 10, 30);
        //PDF::SetHeaderMargin(10);
        //PDF::SetFooterMargin(10);
        // PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
        PDF::SetFontSize('12px'); 
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

        $pdf->SetY(55);
        // Set font
        $pdf->SetFont('helvetica', 'I', 8);
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(uniqid().'_SamplePDF.pdf');
    }
}

