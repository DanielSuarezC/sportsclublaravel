<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;    

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'administrador')->first();

        $admin = User::create([
            'name' => 'Admin Club',
            'email' => 'admin@club.com',
            'password' => Hash::make('password123'),
            'document' => '12345678',
            'phone' => '3000000000',
            'club_id' => 1
        ]);

        $admin->roles()->attach($adminRole);
    }
}
