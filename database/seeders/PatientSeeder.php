<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'dni' => '123456789',
            'visit_code' => 'VIS-12345',
            'number' => 12345,
            'birth_date' => '1990-01-01',
            'address' => '123 Main Street, City',
            'belongings' => 'Wallet, keys, phone',
            'phone_number' => '123-456-7890',
            'extra_info' => 'No additional information.',
            'abuse_substances' => false,
            'exit_date' => null,
            'entry_date' => '2024-05-20',
            'name' => 'John',
            'surname' => 'Doe',
        ]);

        Patient::create([
            'dni' => '987654321',
            'visit_code' => 'VIS-54321',
            'number' => 54321,
            'birth_date' => '1985-06-15',
            'address' => '456 Elm Street, Town',
            'belongings' => 'Glasses, watch',
            'phone_number' => '987-654-3210',
            'extra_info' => 'Allergic to peanuts.',
            'abuse_substances' => true,
            'exit_date' => '2024-05-25',
            'entry_date' => '2024-05-18',
            'name' => 'Jane',
            'surname' => 'Smith',
        ]);

        Patient::create([
            'dni' => '123456789',
            'visit_code' => 'VIS-12345',
            'number' => 12345,
            'birth_date' => '1990-01-01',
            'address' => '123 Main Street, City',
            'belongings' => 'Wallet, keys, phone',
            'phone_number' => '123-456-7890',
            'extra_info' => 'No additional information.',
            'abuse_substances' => false,
            'exit_date' => null,
            'entry_date' => '2024-05-20',
            'name' => 'John',
            'surname' => 'Doe',
        ]);

        Patient::create([
            'dni' => '987654321',
            'visit_code' => 'VIS-54321',
            'number' => 54321,
            'birth_date' => '1985-06-15',
            'address' => '456 Elm Street, Town',
            'belongings' => 'Glasses, watch',
            'phone_number' => '987-654-3210',
            'extra_info' => 'Allergic to peanuts.',
            'abuse_substances' => true,
            'exit_date' => '2024-05-25',
            'entry_date' => '2024-05-18',
            'name' => 'Jane',
            'surname' => 'Smith',
        ]);

        Patient::create([
            'dni' => '456789123',
            'visit_code' => 'VIS-67890',
            'number' => 67890,
            'birth_date' => '1982-03-10',
            'address' => '789 Oak Avenue, Village',
            'belongings' => 'Book, headphones',
            'phone_number' => '456-789-1230',
            'extra_info' => 'Likes to travel.',
            'abuse_substances' => false,
            'exit_date' => null,
            'entry_date' => '2024-05-22',
            'name' => 'Michael',
            'surname' => 'Johnson',
        ]);

        Patient::create([
            'dni' => '654321987',
            'visit_code' => 'VIS-98765',
            'number' => 98765,
            'birth_date' => '1978-12-05',
            'address' => '321 Pine Street, Hamlet',
            'belongings' => 'Laptop, charger',
            'phone_number' => '654-321-9870',
            'extra_info' => 'Vegetarian diet.',
            'abuse_substances' => false,
            'exit_date' => null,
            'entry_date' => '2024-05-19',
            'name' => 'Emily',
            'surname' => 'Brown',
        ]);

        Patient::create([
            'dni' => '135792468',
            'visit_code' => 'VIS-24680',
            'number' => 24680,
            'birth_date' => '1995-08-20',
            'address' => '246 Maple Street, Suburb',
            'belongings' => 'Water bottle, snacks',
            'phone_number' => '135-792-4680',
            'extra_info' => 'Enjoys outdoor activities.',
            'abuse_substances' => true,
            'exit_date' => '2024-05-23',
            'entry_date' => '2024-05-17',
            'name' => 'Daniel',
            'surname' => 'Taylor',
        ]);

    }
}
