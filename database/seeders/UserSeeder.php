<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'alamat' => 'Indramayu',
            'password' => 'password',
            'role_id' => Role::PEMILIK,
        ]);
        User::factory()->create([
            'alamat' => 'Terisi',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Tambi',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Sliyeg',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Jatibarang',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Karangampel',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Mundu',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Jambe',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Kandanghaur',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Losarang',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Lohbener',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
        User::factory()->create([
            'alamat' => 'Tambi',
            'password' => 'password',
            'role_id' => Role::TAMU
        ]);
    }
}
