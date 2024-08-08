<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::create([ //ID = 1
            'name'           => 'ABC',
            'create_user_id' => 1
        ]);

        $category = Category::create([ //ID = 2
            'name'           => 'DEF',
            'create_user_id' => 1
        ]);

        $category = Category::create([ //ID = 3
            'name'           => 'GHI',
            'create_user_id' => 1
        ]);

        $category = Category::create([ //ID = 4
            'name'           => 'JKL',
            'create_user_id' => 1
        ]);

        $category = Category::create([ //ID = 5
            'name'           => 'MNO',
            'create_user_id' => 1
        ]);

        $category = Category::create([ //ID = 6
            'name'           => 'PQR',
            'create_user_id' => 1
        ]);
    }
}
