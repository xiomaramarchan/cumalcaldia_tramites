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
        Excel::import(new EmpleadosImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Data importada con éxito!');
     }
  
     // Exportar data de la base de datos
    public function exportarDataEmpleados(Request $request) 
    {        
        return Excel::download(new EmpleadosExport, 'personal_alcaldia.xlsx');
    }
}
