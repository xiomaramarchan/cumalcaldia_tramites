<?php

namespace App\Imports;

use App\Models\Empleado;
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
            'telefono'  => $row[3],
            'email'     => $row[4],
            'direccion' => $row[5],
            //
        ]);
    }
}
