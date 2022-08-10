<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $User=[
            [
                'id'=>'1',
                'name'=>'Superadmin',
                /*'apellido'=>'Usuario',
                'ci_pasaporte'=>null,*/
                'email'=>'superadmin@home24.com',
                /*'fecha_ingreso'=>'2018-01-01',
                'telefono'=>null,*/
                'password'=>bcrypt('123456')
            ],
            [
                'id'=>'2',
                'name'=>'Administrador',
                /*'apellido'=>'Usuario',
                'ci_pasaporte'=>null,*/
                'email'=>'administrador@home24.com',
                /*'fecha_ingreso'=>'2018-01-01',
                'telefono'=>null,*/
                'password'=>bcrypt('123456')
            ],            
            [
                'id'=>'3',
                'name'=>'Empleado',
                /*'apellido'=>'Usuario',
                'ci_pasaporte'=>null,*/
                'email'=>'empleado@home24.com',
                /*'fecha_ingreso'=>'2018-01-01',
                'telefono'=>null,*/
                'password'=>bcrypt('123456')
            ]
            
        ];
        
        foreach($User as $Usuarios){
            $userdb = User::find($Usuarios['id']);
            if(!$userdb){
                User::create($Usuarios);
            }/*
            else{
                $userdb->update($Usuarios);
            }*/
        }
        
        //asignar roles a usuarios
        $superadmin = User::find(1);
        $superadmin->assignRole('Superadmin');
        
        $administrador = User::find(2);
        $administrador->assignRole('Administrador');
        
        $empleado = User::find(3);
        $empleado->assignRole('Empleado');       
        
    }
}
