<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $users = [
            ['username' => 'operator', 'password' => Hash::make('password'), 'role' => 'operator'],
            ['username' => 'kepala', 'password' => Hash::make('password'), 'role' => 'kepala'],
            ['username' => 'mahasiswa', 'password' => Hash::make('password'), 'role' => 'mahasiswa'],
        ];

        foreach($users as $user) 
        {
            User::create($user);
        }
    }
}
