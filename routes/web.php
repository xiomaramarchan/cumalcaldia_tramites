<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\EmpleadoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Pruebas para generar los pdf
Route::get('/constancias', [ConstanciaController::class,'index'])->name('Constancias');
Route::get('/sample-pdf', [ConstanciaController::class,'samplePDF'])->name('SamplePDF');
Route::get('/save-pdf', [ConstanciaController::class,'savePDF'])->name('SavePDF');
Route::get('/download-pdf', [ConstanciaController::class,'downloadPDF'])->name('DownloadPDF');
Route::get('/html-to-pdf', [ConstanciaController::class,'htmlToPDF'])->name('HtmlToPDF');

// rutas para importar y exportar  la data de los empleados
Route::get('admin/empleados', [EmpleadoController::class, 'index'])->name('admin.dataempleados');
Route::post('importardataempleados', [EmpleadoController::class, 'importarDataEmpleados'])->name('empleados.importar');
Route::get('exportardataempleados', [EmpleadoController::class, 'exportarDataEmpleados'])->name('empleados.exportar');

// rutas para importar y exportar la data de la nomina de empleados

//Route::post('importardataempleadosnomina', [EmpleadoNominaController::class, 'importarDataEmpleadosNominas'])->name('empleados_nomina.importar');