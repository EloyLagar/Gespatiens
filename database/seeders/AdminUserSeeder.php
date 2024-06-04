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
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gespatiens.com',
        //     'password' => Hash::make('Gespatiens.7931'),
        //     'speciality' => 'admin',
        //     'signature' => 'admin_signature.png',
        //     'phone_number' => '1234567890',
        // ]);

        $specialities = ['educator', 'worker', 'medical', 'psychologist'];

        foreach ($specialities as $speciality) {
            for ($i = 1; $i <= 2; $i++) {
                User::create([
                    'name' => $speciality . ' ' . $i,
                    'email' => $speciality . $i . '@mail.com',
                    'password' => Hash::make('password'),
                    'speciality' => $speciality,
                    'signature' => null,
                    'phone_number' => '9' . rand(100000000, 999999999),
                ]);
            }
        }
    }
}
