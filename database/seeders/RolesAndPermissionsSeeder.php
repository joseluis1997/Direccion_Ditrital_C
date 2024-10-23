<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos Usuarios
        Permission::create(['name' => 'Crear Usuario']);
        Permission::create(['name' => 'Modificar Usuario']);
        Permission::create(['name' => 'Eliminar Usuario']);

        // Crear permisos profesores
        Permission::create(['name' => 'Crear Profesor']);
        Permission::create(['name' => 'Modificar Profesor']);
        Permission::create(['name' => 'Eliminar Profesor']);

         // Crear permisos Nucleos
         Permission::create(['name' => 'Crear Nucleo']);
         Permission::create(['name' => 'Modificar Nucleo']);
         Permission::create(['name' => 'Eliminar Nucleo']);

        // Crear permisos Unidad_Educativa
        Permission::create(['name' => 'Crear Unidad_Educativa']);
        Permission::create(['name' => 'Modificar Unidad_Educativa']);
        Permission::create(['name' => 'Eliminar Unidad_Educativa']);

        // Crear roles y asignar permisos

        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());
        
    }
}
