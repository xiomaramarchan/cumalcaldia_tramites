<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UserController;


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
    return view('home');
});

Auth::routes();

//Rutas para adminisdtrar los usuarios del sistema
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/registrar', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::get('/usuarios/ver/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/usuarios/editar/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('/usuarios/crear',  [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::put('/usuarios/editar/{id}',  [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::get('/usuarios/eliminar/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Pruebas para generar los pdf
Route::get('/constancias', [ConstanciaController::class,'index'])->name('Constancias');
Route::get('/sample-pdf', [ConstanciaController::class,'ConstanciaPdf'])->name('ConstanciaPdf');
Route::get('/save-pdf', [ConstanciaController::class,'savePDF'])->name('SavePDF');
Route::get('/download-pdf', [ConstanciaController::class,'downloadPDF'])->name('DownloadPDF');
Route::get('/html-to-pdf', [ConstanciaController::class,'htmlToPDF'])->name('HtmlToPDF');

// rutas para importar y exportar  la data de los empleados
Route::get('admin/empleados', [EmpleadoController::class, 'index'])->name('admin.dataempleados');
Route::post('importardataempleados', [EmpleadoController::class, 'importarDataEmpleadoNomina'])->name('empleados.importar');
Route::get('exportardataempleados', [EmpleadoController::class, 'exportarDataEmpleados'])->name('empleados.exportar');

// rutas para importar y exportar la data de la nomina de empleados

//Route::post('importardataempleadosnomina', [EmpleadoNominaController::class, 'importarDataEmpleadosNominas'])->name('empleados_nomina.importar');