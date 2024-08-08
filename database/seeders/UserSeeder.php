<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(25)->create();

        $user = User::create([ //ID = 1 (admin)
            'name'      => 'Kareem Tarek',
            'email'     => 'admin@gmail.com',
            'user_type' => 'admin',
            'password'  => bcrypt('123456789'),
            // 'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
        ]);

    }
}
