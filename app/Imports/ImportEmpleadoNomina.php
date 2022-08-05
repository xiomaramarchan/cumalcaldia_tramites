<?php

namespace App\Imports;

use App\Models\EmpleadoNomina;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ImportEmpleadoNomina implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }  
    
    /**
    * @param array $row    
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmpleadoNomina([
            'nomina_codigo'=> $row[0],
            'empleado_cedula'=>$row[1],
            'sueldo_base'    => $row[2],
            'sueldo_integral'   => $row[3],
            'fecha_ingreso' => $row[4],
            'estatus'  => $row[5],
            'cargo'  => $row[6],            
            'unidad_administrativa'     => $row[7],
            'fecha_egreso'  => $row[8],           
            
        ]);
    }
}
