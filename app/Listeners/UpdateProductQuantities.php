<?php
namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UpdateProductQuantities
{
    public function handle(OrderPlaced $event)
    {
        DB::transaction(function () use ($event) {
            foreach ($event->order['products'] as $productOrder) {
                $product = Product::findOrFail($productOrder['id']);

                if ($product->quantity < $productOrder['quantity']) {
                    throw new \Exception('Not enough stock for product: ' . $product->name);
                }

                $product->decrement('quantity', $productOrder['quantity']);
            }
        });
    }
}
