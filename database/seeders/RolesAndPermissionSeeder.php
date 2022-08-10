<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
            //definir todos los permisos
            $permisos = [
                ['id'=>'1','name'=>'admin'],
                ['id'=>'2','name'=>'view'],
                ['id'=>'3','name'=>'edit'],
                ['id'=>'4','name'=>'create'],
                ['id'=>'5','name'=>'update']
            ];
            
            foreach($permisos as $permiso){
                $permisodb = Permission::find($permiso['id']);
                if(!$permisodb){
                    Permission::create($permiso);
                }
                else{
                    $permisodb->name = $permiso['name'];
                    $permisodb->save();
                }
            }
            
            //definir todos los roles
            $roles =[
                ['id'=>'1','name'=>'Superadmin'],
                ['id'=>'2','name'=>'Administrador'],
                ['id'=>'3','name'=>'Empleado'],            
            ];
            
            foreach($roles as $rol){
                $roldb = Role::find($rol['id']);
                if(!$roldb){
                    $role = Role::create($rol);
                    $role->givePermissionTo('admin');
                }
                else{
                    $roldb->name = $rol['name'];
                    $roldb->save();
                }
            }
    }
}
