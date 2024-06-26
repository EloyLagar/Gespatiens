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
            'number' => 1,
            'birth_date' => '1990-01-01',
            'address' => '123 Main Street, City',
            'belongings' => 'Wallet, keys, phone',
            'phone_number' => '123-456-7890',
            'extra_info' => 'No additional information.',
            'abuse_substances' => 'cocaina',
            'exit_date' => null,
            'entry_date' => '2024-05-20',
            'name' => 'John',
            'surname' => 'Doe',
        ]);

        Patient::create([
            'dni' => '987654321',
            'visit_code' => 'VIS-54321',
            'number' => null,
            'birth_date' => '1985-06-15',
            'address' => '456 Elm Street, Town',
            'belongings' => 'Glasses, watch',
            'phone_number' => '987-654-3210',
            'extra_info' => 'Allergic to peanuts.',
            'abuse_substances' => 'Cannabis',
            'exit_date' => '2024-05-25',
            'entry_date' => '2024-05-18',
            'name' => 'Jane',
            'surname' => 'Smith',
        ]);

        Patient::create([
            'dni' => '123456789',
            'visit_code' => 'VIS-12345',
            'number' => 2,
            'birth_date' => '1990-01-01',
            'address' => '123 Main Street, City',
            'belongings' => 'Wallet, keys, phone',
            'phone_number' => '123-456-7890',
            'extra_info' => 'No additional information.',
            'abuse_substances' => 'Cannabis',
            'exit_date' => null,
            'entry_date' => '2024-05-20',
            'name' => 'John',
            'surname' => 'Doe',
        ]);

        Patient::create([
            'dni' => '987654321',
            'visit_code' => 'VIS-54321',
            'number' => null,
            'birth_date' => '1985-06-15',
            'address' => '456 Elm Street, Town',
            'belongings' => 'Glasses, watch',
            'phone_number' => '987-654-3210',
            'extra_info' => 'Allergic to peanuts.',
            'abuse_substances' => 'Alcohol',
            'exit_date' => '2024-05-25',
            'entry_date' => '2024-05-18',
            'name' => 'Jane',
            'surname' => 'Smith',
        ]);

        Patient::create([
            'dni' => '456789123',
            'visit_code' => 'VIS-67890',
            'number' => 5,
            'birth_date' => '1982-03-10',
            'address' => '789 Oak Avenue, Village',
            'belongings' => 'Book, headphones',
            'phone_number' => '456-789-1230',
            'extra_info' => 'Likes to travel.',
            'abuse_substances' => 'Speed',
            'exit_date' => null,
            'entry_date' => '2024-05-22',
            'name' => 'Michael',
            'surname' => 'Johnson',
        ]);

        Patient::create([
            'dni' => '654321987',
            'visit_code' => 'VIS-98765',
            'number' => 8,
            'birth_date' => '1978-12-05',
            'address' => '321 Pine Street, Hamlet',
            'belongings' => 'Laptop, charger',
            'phone_number' => '654-321-9870',
            'extra_info' => 'Vegetarian diet.',
            'abuse_substances' => 'Cloretilo',
            'exit_date' => null,
            'entry_date' => '2024-05-19',
            'name' => 'Emily',
            'surname' => 'Brown',
        ]);

        Patient::create([
            'dni' => '135792468',
            'visit_code' => 'VIS-24680',
            'number' => null,
            'birth_date' => '1995-08-20',
            'address' => '246 Maple Street, Suburb',
            'belongings' => 'Water bottle, snacks',
            'phone_number' => '135-792-4680',
            'extra_info' => 'Enjoys outdoor activities.',
            'abuse_substances' => 'Pooper',
            'exit_date' => '2024-05-23',
            'entry_date' => '2024-05-17',
            'name' => 'Daniel',
            'surname' => 'Taylor',
        ]); {

            $patients = [
                [
                    'dni' => '123456789',
                    'visit_code' => 'VIS-12345',
                    'number' => 32,
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
                ],
                [
                    'dni' => '987654321',
                    'visit_code' => 'VIS-54321',
                    'number' => 31,
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
                ],
                [
                    'dni' => '456789123',
                    'visit_code' => 'VIS-67890',
                    'number' => 30,
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
                ],
                [
                    'dni' => '654321987',
                    'visit_code' => 'VIS-98765',
                    'number' => 29,
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
                ],
                [
                    'dni' => '135792468',
                    'visit_code' => 'VIS-24680',
                    'number' => 27,
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
                ],
                [
                    'dni' => '192837465',
                    'visit_code' => 'VIS-11223',
                    'number' => 26,
                    'birth_date' => '1992-07-14',
                    'address' => '789 Willow Lane, City',
                    'belongings' => 'Sunglasses, hat',
                    'phone_number' => '192-837-4650',
                    'extra_info' => 'Lactose intolerant.',
                    'abuse_substances' => false,
                    'exit_date' => null,
                    'entry_date' => '2024-05-21',
                    'name' => 'Sarah',
                    'surname' => 'Miller',
                ],
                [
                    'dni' => '246813579',
                    'visit_code' => 'VIS-33445',
                    'number' => 25,
                    'birth_date' => '1988-04-22',
                    'address' => '555 Birch Road, Village',
                    'belongings' => 'Notebook, pen',
                    'phone_number' => '246-813-5790',
                    'extra_info' => 'Speaks three languages.',
                    'abuse_substances' => true,
                    'exit_date' => '2024-05-24',
                    'entry_date' => '2024-05-16',
                    'name' => 'David',
                    'surname' => 'Garcia',
                ],
                [
                    'dni' => '369258147',
                    'visit_code' => 'VIS-55667',
                    'number' => 24,
                    'birth_date' => '1975-11-30',
                    'address' => '123 Cedar Street, Town',
                    'belongings' => 'Briefcase, umbrella',
                    'phone_number' => '369-258-1470',
                    'extra_info' => 'Diabetic.',
                    'abuse_substances' => false,
                    'exit_date' => null,
                    'entry_date' => '2024-05-15',
                    'name' => 'Anna',
                    'surname' => 'Martinez',
                ],
                [
                    'dni' => '482615379',
                    'visit_code' => 'VIS-77889',
                    'number' => 22,
                    'birth_date' => '1980-09-19',
                    'address' => '321 Spruce Street, Suburb',
                    'belongings' => 'Backpack, books',
                    'phone_number' => '482-615-3790',
                    'extra_info' => 'Prefers non-smoking rooms.',
                    'abuse_substances' => true,
                    'exit_date' => '2024-05-26',
                    'entry_date' => '2024-05-14',
                    'name' => 'Chris',
                    'surname' => 'Lee',
                ],
                [
                    'dni' => '573829104',
                    'visit_code' => 'VIS-88990',
                    'number' => 21,
                    'birth_date' => '1998-12-25',
                    'address' => '789 Poplar Avenue, City',
                    'belongings' => 'Smartphone, earbuds',
                    'phone_number' => '573-829-1040',
                    'extra_info' => 'Recently moved to the area.',
                    'abuse_substances' => false,
                    'exit_date' => null,
                    'entry_date' => '2024-05-13',
                    'name' => 'Jessica',
                    'surname' => 'Williams',
                ],
                [
                    'dni' => '618273945',
                    'visit_code' => 'VIS-99001',
                    'number' => 20,
                    'birth_date' => '1970-02-28',
                    'address' => '123 Oak Avenue, Hamlet',
                    'belongings' => 'Handbag, scarf',
                    'phone_number' => '618-273-9450',
                    'extra_info' => 'Enjoys painting.',
                    'abuse_substances' => false,
                    'exit_date' => null,
                    'entry_date' => '2024-05-12',
                    'name' => 'Laura',
                    'surname' => 'Harris',
                ],
                [
                    'dni' => '741852963',
                    'visit_code' => 'VIS-11122',
                    'number' => 19,
                    'birth_date' => '1993-05-11',
                    'address' => '321 Maple Lane, Town',
                    'belongings' => 'Tablet, stylus',
                    'phone_number' => '741-852-9630',
                    'extra_info' => 'Plays the guitar.',
                    'abuse_substances' => true,
                    'exit_date' => '2024-05-27',
                    'entry_date' => '2024-05-11',
                    'name' => 'Kevin',
                    'surname' => 'Walker',
                ],
                [
                    'dni' => '852963741',
                    'visit_code' => 'VIS-22233',
                    'number' => 18,
                    'birth_date' => '1987-03-21',
                    'address' => '555 Elm Street, City',
                    'belongings' => 'Watch, bracelet',
                    'phone_number' => '852-963-7410',
                    'extra_info' => 'Vegan diet.',
                    'abuse_substances' => false,
                    'exit_date' => null,
                    'entry_date' => '2024-05-10',
                    'name' => 'Olivia',
                    'surname' => 'Hall',
                ],
                [
                    'dni' => '963852741',
                    'visit_code' => 'VIS-33344',
                    'number' => 17,
                    'birth_date' => '1991-07-08',
                    'address' => '789 Birch Road, Suburb',
                    'belongings' => 'Camera, tripod',
                    'phone_number' => '963-852-7410',
                    'extra_info' => 'Photographer.',
                    'abuse_substances' => false,
                    'exit_date' => null,
                    'entry_date' => '2024-05-09',
                    'name' => 'Sophia',
                    'surname' => 'Robinson',
                ],
            ];

            foreach ($patients as $patient) {
                Patient::create($patient);
            }
        }
    }
}
