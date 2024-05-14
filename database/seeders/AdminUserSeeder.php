<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gespatiens.com',
            'password' => Hash::make('Gespatiens.7931'),
            'speciality' => 'admin',
            'signature' => 'admin_signature.png',
            'phone_number' => '1234567890',
        ]);
    }
}
