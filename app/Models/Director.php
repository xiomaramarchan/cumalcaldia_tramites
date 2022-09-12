<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $fillable = [

        'cedula','nombres','apellidos','cargo','fecha_nombramiento','titulo_academico','resolucion','firma','otro'
     ];
     protected $primaryKey = 'cedula';
     public $incrementing = false;
     protected $keyType='string';
     public $timestamps = false;
}