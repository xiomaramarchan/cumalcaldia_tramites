<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
use App\Models\Nomina;
class NominasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nomina::truncate();

        $nominas =  [
            [
              'id' => '1',
              'codigo' => '0001',
              'descripcion' => 'EMPLEADO FIJO',
              
            ],
            [
              'id' => '2',
              'codigo' => '0002',
              'descripcion' => 'OBRERO FIJO',
             
            ],
            [
              'id' => '3',
              'codigo' => '0003',
              'descripcion' => 'EMPLEADOS JUBILADOS',
              
            ],
            [
              'id' => '4',
              'codigo' => '0004',
              'descripcion' => 'OBREROS JUBILADOS',
              
            ],
            [
              'id' => '5',
              'codigo' => '0005',
              'descripcion' => 'EMPLEADOS PENSIONADOS',
              
            ],
            [
              'id' => '6',
              'codigo' => '0006',
              'descripcion' => 'OBREROS PENSIONADOS',
              
            ],
            [
              'id' => '7',
              'codigo' => '0007',
              'descripcion' => 'PERSONAL CONTRATADO',
              
            ],
            [
              'id' => '8',
              'codigo' => '0010',
              'descripcion' => 'ALTO NIVEL Y DIRECCIÓN',
              
            ],
            [
              'id' => '9',
              'codigo' => '0011',
              'descripcion' => 'COMISIÓN DE SERVICIOS',
                
            ],
              [
                'id' => '10',
                'codigo' => '0019',
                'descripcion' => 'ALTO NIVEL Y DIRECCIÓN EN COMISIÓN DE SERVICIOS',
                
              ],
            [
              'id' => '11',
              'codigo' => '0016',
              'descripcion' => 'ALTOS Y ALTAS FUNCIONARIAS Y FUNCIONARIOS',
              
            ]
          ];

          foreach($nominas as $nomina){
            $nom = Nomina::find($nomina['codigo']);
            if(!$nom)
            {
              //Nomina::insert($nomina);
              Nomina::create($nomina);
            }            
            /*else{
                $nom->update($nomina);
            }*/
          
        }
    }
}
