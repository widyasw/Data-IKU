<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
/**
     * Display a listing of the database.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Role', true, route('admin.role.index')],
            ['Index', false],
        ];
        $title = 'All Roles';
        $roles = Role::all();
        return view('admin.role.index', compact('breadcrumbs', 'title', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Role', true, route('admin.role.index')],
            ['Create', false],
        ];
        $title = 'Create Role';
        $permissionModules = Permission::all()->groupBy('module_name');

        return view('admin.role.create', compact('breadcrumbs', 'title', 'permissionModules'));
    }

    /**
     * Store a newly created resource in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['required', 'exists:permissions,id'],
        ], [
            'permissions.required' => __('Please choose at least one permission.'),
            'permissions.*.required' => __('Each permission must be selected.'),
            'permissions.*.exists' => __('Selected permission does not exist.'),
        ]);

        try {
            DB::beginTransaction();
            $createdRole = Role::create(['name' => $request->name]);

            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
            $createdRole->syncPermissions($permissions);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route('admin.role.create')->with(['color' => 'bg-success-500', 'message' => __('Berhasil menambahkan data')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $breadcrumbs = [
            ['Role', true, route('admin.role.index')],
            [$role->name, false],
        ];
        $title = $role->name;
        $editable = false;

        $permissionModules = Permission::all()->groupBy('module_name');
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('admin.role.edit', compact('breadcrumbs', 'title', 'role', 'editable', 'permissionModules', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $breadcrumbs = [
            ['Role', true, route('admin.role.index')],
            [$role->name, false],
        ];
        $title = $role->name;
        $editable = true;

        $permissionModules = Permission::all()->groupBy('module_name');
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('admin.role.edit', compact('breadcrumbs', 'title', 'role', 'editable', 'permissionModules', 'rolePermissions'));
    }

    /**
     * Update the specified resource in database.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['required', 'exists:permissions,id'],
        ], [
            'permissions.required' => __('Please choose at least one permission.'),
            'permissions.*.required' => __('Each permission must be selected.'),
            'permissions.*.exists' => __('Selected permission does not exist.'),
        ]);

        try {
            DB::beginTransaction();
            $role->update(['name' => $validated['name']]);

            $permissions = Permission::whereIn('id', $validated['permissions'])->pluck('name')->toArray();
            $role->syncPermissions($permissions);
            DB::commit();

            return redirect()->route('admin.role.index')->with(['color' => 'bg-success-500', 'message' => __('Berhasil mengubah data')]);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from database.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }
}



// $permissionModules = Permission::all()->groupBy('module_name');
