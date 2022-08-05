<?php

namespace App\Http\Controllers;
use App\Imports\EmpleadosImport;
use App\Exports\EmpleadosExport;
use App\Imports\ImportEmpleadoNomina;
//use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Validator;
use Excel;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //
    public function index(){
        return view('admin.empleados.data_empleados');
     }
  
     // Importar data a la base de datos
     public function importarDataEmpleados(Request $request){

            /*$this->validate($request, [
                "file_empleados" => "required|mimes:csv" // txt is needed for csv mime type validation
            ]);*/
            /*$validator = Validator::make($request->all(), [
                'file_empleados' => ['required','mimes:csv']
               // file validation
                
            ]); // create the validations
            if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
            {
                
                return back()->withInput()->withErrors($validator);
                // validation failed redirect back to form
                //return back()->with("error", "Formato no valido");
    
            }
            else
            {*/
                if($request->file("file_empleados")) {


                    /*Excel::import(new EmpleadosImport, $request->file('file_empleados')->store('temp'));
                    return back()->with('success', 'Data importada con éxito!');*/
                    try {
                        Excel::import(new EmpleadosImport, $request->file('file_empleados')->store('temp'));
                        return back()->with('success', 'Data importada con éxito!');
                    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                        $msg = "";
                        $failures = $e->failures();
                        foreach ($failures as $failure) {
                            $msg = $failure->row(); // fila que falla
                            $msg = $msg." ".$failure->attribute(); //ya sea clave de encabezado (si se usa la fila de encabezado) o índice de columna
                            $msg = $msg." ".$failure->errors()[0]; // Actual error messages from Laravel validator
                            $msg = $msg." :  con valor ".$failure->values(); //Los valores de la fila que ha fallado                }
                            return back()->with("error", $msg);
                        }
                    }
                }
            /*}*/
        
            
    }
  
     // Exportar data de la base de datos
    public function exportarDataEmpleados(Request $request) 
    {        
        return Excel::download(new EmpleadosExport, 'personal_alcaldia.xlsx');
    }

    public function importarDataEmpleadoNomina(Request $request){

        /*$this->validate($request, [
            "file_empleados" => "required|mimes:xls,csv,xlsx" // txt is needed for csv mime type validation
        ]);*/
        if($request->file("file_empleados")) {
           
            try {
                Excel::import(new ImportEmpleadoNomina, $request->file('file_empleados')->store('temp'));
                return back()->with('success', 'Data importada con éxito!');
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $msg = "";
                $failures = $e->failures();
                foreach ($failures as $failure) {
                    $msg = $failure->row(); // fila que falla
                    $msg = $msg." ".$failure->attribute(); //ya sea clave de encabezado (si se usa la fila de encabezado) o índice de columna
                    $msg = $msg." ".$failure->errors()[0]; // Actual error messages from Laravel validator
                    $msg = $msg." :  con valor ".$failure->values(); //Los valores de la fila que ha fallado                }
                    return back()->with("error", $msg);
                }
            }
        }
         
     }
}
