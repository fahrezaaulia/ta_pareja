<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['pemilik_hajat', 'tamu_hajat'];

        foreach ($role as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
