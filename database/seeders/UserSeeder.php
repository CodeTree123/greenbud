<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'role_id' => '1',
            'first_name' => 'Greenbud',
            'last_name' => 'Admin',
            'email' => 'admin@greenbud.com',
            'phone' => '01*********',
            // 'password' => '$2y$10$M4AduO5h82AyuwcoRuODWOfNUdVVu419PazHnOuQsoqwIJp.6.XjK',
            'password' => Hash::make('rootadmin'),
        ]);
        User::create([
            'role_id' => '2',
            'first_name' => 'Dev',
            'last_name' => 'User',
            'email' => 'user@greenbud.com',
            'phone' => '01988888888',
            'password' => Hash::make('12'),
        ]);
    }
}
