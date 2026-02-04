<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dr. Artur',
            'email' => 'artur@example.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
