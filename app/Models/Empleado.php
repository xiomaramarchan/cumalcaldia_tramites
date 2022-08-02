<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [

        'cedula','nombres','apellidos'/*,'telefono','email','direccion'*/
     ];
     protected $primaryKey = 'cedula';
     public $incrementing = false;
     protected $keyType='string';
     public $timestamps = false;
}
