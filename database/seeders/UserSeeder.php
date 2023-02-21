<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Seeder
        User::create([
            'firstname' => 'Admin',
            'middlename' => '',
            'lastname' => 'Example',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Password123'),
            'role' => 'admin',
        ]);
    }
}
