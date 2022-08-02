<?php

namespace App\Imports;

use App\Models\Empleado;
//use App\Models\EmpleadoNomina;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


class EmpleadosImport implements ToModel, WithStartRow, WithCustomCsvSettings
{

    //Se ingresan en la tabla solo datos a partir de la segunda fila,
    //se omitirá la primera línea que generalmente contiene el encabezado.
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

    //use Importable;
    
    public function rules(): array
    {
        return [
            'cedula' => [
                'required',
                'string',
            ],
            'nombres' => [
                'required',
                'string',
            ],
            'apellidos' => [
                'required',
                'string',
            ],
        ];
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleado([
            'cedula'    => $row[0],
            'nombres'   => $row[1],
            'apellidos' => $row[2],
            /*'telefono'  => $row[3],
            'email'     => $row[4],
            'direccion' => $row[5],*/
            
        ]);
        /*return new EmpleadoNomina([
            'sueldo_base'    => $row[0],
            'sueldo_integral'   => $row[1],
            'fecha_ingreso' => $row[2],
            'estatus'  => $row[3],
            'cargo'  => $row[4],            
            'unidad_administrativa'     => $row[5],
            'fecha_egreso'  => $row[6],
            'nomina_id' => $row[7],
            'empleado_id' => $row[8],
            
        ])*/
    }
}
