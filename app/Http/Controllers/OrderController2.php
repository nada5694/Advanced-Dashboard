<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class OrderController2 extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'products' => 'required|array',
    //         'products.*.id' => 'required|exists:products,id',
    //         'products.*.quantity' => 'required|integer|min:1',
    //     ]);

    //     DB::transaction(function () use ($request) {
    //         $total = 0;

    //         $order = Order::create(['total' => 0]);

    //         foreach ($request->products as $item) {
    //             $product = Product::findOrFail($item['id']);

    //             if ($product->quantity < $item['quantity']) {
    //                 throw new \Exception('Not enough stock for product: ' . $product->name);
    //             }

    //             $product->decrement('quantity', $item['quantity']);
    //             $price = $product->price * $item['quantity'];

    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'product_id' => $product->id,
    //                 'quantity' => $item['quantity'],
    //                 'price' => $price,
    //             ]);

    //             $total += $price;
    //         }

    //         $order->update(['total' => $total]);

    //         return $order;
    //     });

    //     return response()->json(['message' => 'Order created successfully']);
    // }

    // public function show(Order $order)
    // {
    //     $order->load('items.product');
    //     return view('orders.invoice', compact('order'));
    // }


    public function index()
    {
        // Retrieve all orders with related items and products
        $orders = Order::with('items.product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'products'            => 'required|array',
            'products.*.id'       => 'exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->user();

        // Create the order
        $order = Order::create([
            'total'          => 0,
            'create_user_id' => $user->id,
        ]);

        $total = 0;

        foreach ($request->products as $productData) {
            $product   = Product::find($productData['id']);
            $itemTotal = $product->price * $productData['quantity'];
            $total    += $itemTotal;

            // Create the order item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productData['id'],
                'quantity' => $productData['quantity'],
                'price' => $product->price,
            ]);

            // Update product quantity
            $product->decrement('quantity', $productData['quantity']);
        }
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'products' => 'required|array',
    //         'products.*.id' => 'exists:products,id',
    //         'products.*.quantity' => 'required|integer|min:1',
    //     ]);

    //     // Get the authenticated user
    //     // $user = auth()->user();

    //     // // Create the order with the authenticated user's ID and default total value
    //     // $order = Order::create([
    //     //     'total' => 0,
    //     //     'create_user_id' => $user->id,
    //     // ]);

    //     // $total = 0;

    //     // foreach ($request->products as $productData) {
    //     //     $product = Product::find($productData['id']);
    //     //     $itemTotal = $product->price * $productData['quantity'];
    //     //     $total += $itemTotal;

    //     //     $order->items()->create([
    //     //         'product_id' => $productData['id'],
    //     //         'quantity' => $productData['quantity'],
    //     //         'price' => $product->price,
    //     //     ]);

    //     //     $product->decrement('quantity', $productData['quantity']);
    //     // }

    //     // $order->update(['total' => $total]);

    //     $order              = new order();
    //     $order->product_id    = $request->product_id;
    //     // $order->price       = $order->price;
    //     $order->total    = $request->total;
    //     $order->save();

    //     return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    // }


    public function show(Order $order)
    {
        // Load related items and their products
        $order->load('items.product');
        return view('orders.invoice', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load('items.product');
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Restore product quantities before updating
        foreach ($order->items as $item) {
            $item->product->increment('quantity', $item->quantity);
        }

        $order->items()->delete();

        foreach ($request->products as $productData) {
            $order->items()->create([
                'product_id' => $productData['id'],
                'quantity'   => $productData['quantity'],
                'price'      => Product::find($productData['id'])->price,
            ]);

            $product = Product::find($productData['id']);
            $product->decrement('quantity', $productData['quantity']);
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        foreach ($order->items as $item) {
            $item->product->increment('quantity', $item->quantity);
        }

        $order->items()->delete();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
