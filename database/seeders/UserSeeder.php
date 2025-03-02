<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $admin = User::factory()->create([
            'name'  => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        // Cari atau buat role "Admin"
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Berikan role "Admin" ke user
        $admin->assignRole($adminRole);
        echo "User {$admin->email} telah diberikan role 'Admin'.\n";
    }
}
