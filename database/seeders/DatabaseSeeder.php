<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Roles
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => 'admin',
                'description' => 'Gestión total del sistema',
            ],
            [
                'name' => 'Psicólogo',
                'slug' => 'psychologist',
                'description' => 'Gestión de agenda y pacientes',
            ],
            [
                'name' => 'Paciente',
                'slug' => 'patient',
                'description' => 'Acceso al portal de citas',
            ],
            [
                'name' => 'Contador',
                'slug' => 'accountant',
                'description' => 'Acceso limitado a dashboard financiero',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['slug' => $role['slug']], $role);
        }

        // 2. Countries
        $countries = [
            ['code' => 'PE', 'name' => 'Perú'],
            ['code' => 'CO', 'name' => 'Colombia'],
            ['code' => 'MX', 'name' => 'México'],
            ['code' => 'AR', 'name' => 'Argentina'],
            ['code' => 'CL', 'name' => 'Chile'],
            ['code' => 'EC', 'name' => 'Ecuador'],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(['code' => $country['code']], $country);
        }

        // 3. User Super Admin
        $adminRole = Role::where('slug', 'admin')->first();
        $peru = Country::where('code', 'PE')->first();

        User::firstOrCreate(
            ['email' => 'admin@creciendojuntos.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'Creciendo Juntos',
                'password' => 'password', // Will be hashed by model cast or mutator? Wait, model cast is 'hashed'.
                // If model cast is 'hashed', I should provide plain text 'password'. 
                // However, standard User factory uses Hash::make('password').
                // Let's verify User model casts.
                // 'password' => 'hashed',
                // This means if I set 'password' => 'plain', it stores hash.
                // So 'password' => 'password' is correct.
                'phone_number' => '999999999',
                'address' => 'Oficina Principal',
                'role_id' => $adminRole->id,
                'country_id' => $peru->id,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
