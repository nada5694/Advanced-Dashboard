<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductQuantityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_decrements_product_quantity_when_order_is_placed()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 100,
            'quantity' => 10
        ]);

        $response = $this->post('/orders', [
            'products' => [
                ['id' => $product->id, 'quantity' => 2]
            ]
        ]);

        $response->assertStatus(200);

        $this->assertEquals(8, $product->fresh()->quantity);
    }
}
