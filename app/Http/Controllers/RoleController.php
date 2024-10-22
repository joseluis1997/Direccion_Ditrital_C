<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Permission; 
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all(); // Obtener todos los permisos
        return view('roles.create', compact('permissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all(); // Obtener todos los permisos
        $assignedPermissions = $role->permissions->pluck('id')->toArray(); // Obtener permisos asignados
        return view('roles.edit', compact('role', 'permissions', 'assignedPermissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));
        $role->permissions()->sync($request->input('permissions', [])); // Asignar permisos
        return redirect()->route('roles.index')->with('success', 'Rol creado con éxito.');
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permissions', [])); // Actualizar permisos
        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito.');
    }
    public function destroy(Role $role)
    {
        $estado = true;

        if($role->estado){
            $estado = false;
        }

        $role->estado = $estado;
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito.');
    }
}
