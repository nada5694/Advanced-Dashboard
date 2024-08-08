<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::create([ //ID = 1
            'product_id'        =>1,
            'quantity'          => 10,
            'price'             => 1000,
            'create_user_id'    => 1,
        ]);
    }
}
