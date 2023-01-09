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
        $admin =User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.admin',
            'password' => Crypt::encrypt('password'),
        ])->assignRole('admin');
        Employee::create([
            'DNI' => '12345678',
            'phone' => '78955874',
            'address' => 'calle falsa 123',
            'city' => 'Lima',
            'user_id' => $admin->id,
        ]);
        Client::create([
            'DNI' => '12345678',
            'name' => 'paco',

        ]);
        $this->call(RoleSeeder::class);




        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
