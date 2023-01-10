<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        $admin =User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.admin',
            'password' =>bcrypt('password'),
        ])->assignRole('admin');
        Employee::create([
            'DNI' => '12345678',
            'phone' => '78955874',
            'address' => 'calle falsa 123',
            'city' => 'Lima',
            'user_id' => $admin->id,
        ]);

        $receptionist =User::factory()->create([
            'name' => 'Receptionist User',
            'email' => 'receptionist@admin.admin',
            'password' =>bcrypt('password'),
        ])->assignRole('receptionist');
        Employee::create([
            'DNI' => '987654321',
            'phone' => '78955874',
            'address' => 'calle falsa 123',
            'city' => 'Lima',
            'user_id' => $receptionist->id,
        ]);
        Client::create([
            'DNI' => '12345678',
            'name' => 'paco',

        ]);





        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
