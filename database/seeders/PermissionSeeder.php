<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            'iku 1' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 2' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 3' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 4' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 5' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 6' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 7' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'iku 8' => ['lihat', 'cetak', 'tambah', 'edit', 'hapus'],
            'user' => ['lihat', 'tambah', 'edit', 'hapus'],
            'hak akses' => ['lihat', 'tambah', 'edit', 'hapus'],
        ];

        $permissions = [];

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                Permission::updateOrCreate(
                    [
                        'module_name' => $module,
                        'name' => "{$module} {$action}"
                    ],
                    ['guard_name' => 'web']
                );
            }
        }

        // Buat role "Admin" jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Ambil semua permission yang ada
        $permissions = Permission::pluck('name')->toArray();
        // Terapkan semua permission ke role Admin
        $adminRole->syncPermissions($permissions);

        echo "Role 'Admin' berhasil dibuat dan semua permission telah diberikan.\n";
    }
}
