<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::create([ //ID = 1
            'name'        => 'Product_1',
            'price'       => 100,
            'category_id' => 1,
            'quantity'    => 50,
        ]);

        $product = Product::create([ //ID = 2
            'name'        => 'Product_2',
            'price'       => 170,
            'discount'    => 10,
            'category_id' => 2,
            'quantity'    => 70,
        ]);

        $product = Product::create([ //ID = 3
            'name'        => 'Product_3',
            'price'       => 500,
            'discount'    => 150,
            'category_id' => 3,
            'quantity'    => 0,
        ]);
    }
}
