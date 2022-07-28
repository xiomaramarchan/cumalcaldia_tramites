<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoNomina extends Model
{
    use HasFactory;
    protected $fillable = [

        'nomina_id','empleado_id','sueldo_base','sueldo_integral','fecha_ingreso','estatus','cargo','unidad_administrativa','fecha_egreso'
     ];
     
}
