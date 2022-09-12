<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;
class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $directores =  [
            [
              'id' => '1',
              'cedula' => '8423625',
              'nombres' => 'WILLIAM',
              'apellidos'=> 'MARVAL',
              'cargo'=> 'DIRECTOR DE TALENTO HUMANO',
              'fecha_nombramiento'=> '02-08-2021',
              'titulo_academico'=> 'LCDO.',
              'resolucion'=> 'Resolución N° XX',
              'firma'=> 'WM/a',
              'otro'=> 'G O Ext N° XX',

            ],
           
          ];

          foreach($directores as $director){
            $dir = Director::find($director['cedula']);
            if(!$dir)
            {
              //Nomina::insert($nomina);
              Director::create($director);
            }            
            /*else{
                $nom->update($nomina);
            }*/
          
        }
    }
}
