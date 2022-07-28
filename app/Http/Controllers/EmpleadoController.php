<?php

namespace App\Http\Controllers;
use App\Imports\EmpleadosImport;
use App\Exports\EmpleadosExport;
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

        $this->validate($request, [
            "file_empleados" => "required|mimes:xls,csv,xlsx" // txt is needed for csv mime type validation
        ]);
        if($request->file("file_empleados")) {
        try {
            Excel::import(new EmpleadosImport, $request->file('file_empleados')->store('temp'));
            return back()->with('success', 'Data importada con éxito!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $msg = "";
                $failures = $e->failures();
                foreach ($failures as $failure) {
                    $msg = "Ry ".$failure->row(); // row that went wrong
                    $msg = $msg." vir hoof ".$failure->attribute(); // either heading key (if using heading row concern) or column index
                    $msg = $msg.". ".$failure->errors()[0]; // Actual error messages from Laravel validator
                    // $msg = $msg." : met waarde ".$failure->values(); // The values of the row that has failed: not available in version
                }
                return back()->with("error", $msg);
            }
        }

        return back()->with("error", "Lêer nie gevind nie");



        /*Excel::import(new EmpleadosImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Data importada con éxito!');*/
     }
  
     // Exportar data de la base de datos
    public function exportarDataEmpleados(Request $request) 
    {        
        return Excel::download(new EmpleadosExport, 'personal_alcaldia.xlsx');
    }
}
