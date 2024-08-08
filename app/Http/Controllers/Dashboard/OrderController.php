<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        // $orders = Order::with('products')->get();
        $orders = Order::with('product', 'create_user', 'update_user')->get();
        foreach ($orders as $order) {
        if ($order->discount > 0) {
            $order->price_after_discount = $order->price - ($order->price * 100 / $order->discount);
        } else {
            $order->price_after_discount = null;
        }
        }
        // $products = Product::with('product_id')->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    // public function create(Request $request)
    // {
    //     DB::transaction(function () use ($request) {
    //         foreach ($request->products as $productOrder) {
    //             $product = Product::findOrFail($productOrder['id']);

    //             if ($product->quantity < $productOrder['quantity']) {
    //                 throw new \Exception('Not enough stock for product: ' . $product->name);
    //             }

    //             $product->decrement('quantity', $productOrder['quantity']);
    //         }

    //         // Proceed with creating the order
    //     });

    //     return response()->json(['message' => 'Order created successfully']);
    // }

    public function create()
    {
        $products = Product::all();
        $orders   = Order::all();
        return view('dashboard.orders.create', compact('products', 'orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'price'                => 'required|numeric',
            'description'          => 'nullable|string',
            'quantity'             => 'required|integer|min:0',
            'product_id'           => 'nullable|exists:products,id',
            'discount'             => 'nullable|integer|max:100',
            'price_after_discount' => 'required|integer|min:0'
        ]);

        try {
            $order = new Order();
            if ($request->has('product_id')) {
                $order->product_id = $request->product_id;
            }
            $order->product_id            = $request->product_id;
            $order->quantity              = $request->quantity;
            $order->price                 = $request->price;
            $order->discount              = $request->discount;
            $order->price_after_discount  = $request->price_after_discount;
            $order->description           = $request->description;
            $order->save();

            // Fetch the related product
            $product = Product::find($request->product_id);

            // Decrement the product's quantity
            $product->quantity -= $request->quantity;
            // if ($product->quantity <= 0)
            // {
            //     return redirect()->route('order.index')->with('error', "Product \"{$product->name}\" hasn't enough quantity \"{$product->quantity}\".");
            // }
            $product->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('orders.index')->with('success', "Order \"{$order->id}\" has been created successfully.");
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create order. Please try again.');
        }
    }

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

// namespace App\Http\Controllers\Dashboard;

// use App\Models\Order;
// use App\Models\Product;
// use App\Models\OrderProduct;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;

// class OrderController extends Controller
// {
//     /**
//      * Display a listing of the orders.
//      */
//     public function index()
//     {
//         $orders = Order::with('products')->get();
//         return response()->json($orders);
//     }

//     /**
//      * Store a newly created order in storage.
//      */
//     public function store(Request $request)
//     {
//         DB::transaction(function () use ($request) {
//             $order = Order::create($request->only('total', 'price'));

//             foreach ($request->products as $productData) {
//                 $product = Product::find($productData['id']);
//                 $order->products()->attach($product, ['quantity' => $productData['quantity'], 'price' => $productData['price']]);
//             }
//         });

//         return response()->json(['message' => 'Order created successfully']);
//     }

//     /**
//      * Display the specified order.
//      */
//     public function show($id)
//     {
//         $order = Order::with('products')->find($id);

//         if (!$order) {
//             return response()->json(['message' => 'Order not found'], 404);
//         }

//         return response()->json($order);
//     }

//     /**
//      * Update the specified order in storage.
//      */
//     public function update(Request $request, $id)
//     {
//         $order = Order::find($id);

//         if (!$order) {
//             return response()->json(['message' => 'Order not found'], 404);
//         }

//         DB::transaction(function () use ($order, $request) {
//             $order->update($request->only('total', 'price'));

//             $order->products()->detach();
//             foreach ($request->products as $productData) {
//                 $product = Product::find($productData['id']);
//                 $order->products()->attach($product, ['quantity' => $productData['quantity'], 'price' => $productData['price']]);
//             }
//         });

//         return response()->json(['message' => 'Order updated successfully']);
//     }

//     /**
//      * Remove the specified order from storage.
//      */
//     public function destroy($id)
//     {
//         $order = Order::find($id);

//         if (!$order) {
//             return response()->json(['message' => 'Order not found'], 404);
//         }

//         DB::transaction(function () use ($order) {
//             $order->products()->detach();
//             $order->delete();
//         });

//         return response()->json(['message' => 'Order deleted successfully']);
//     }

//     /**
//      * Add a product to the specified order.
//      */
//     public function addProduct(Request $request, $orderId)
//     {
//         $order = Order::find($orderId);

//         if (!$order) {
//             return response()->json(['message' => 'Order not found'], 404);
//         }

//         $product = Product::find($request->product_id);
//         if (!$product) {
//             return response()->json(['message' => 'Product not found'], 404);
//         }

//         $order->products()->attach($product, ['quantity' => $request->quantity, 'price' => $request->price]);

//         return response()->json(['message' => 'Product added to order successfully']);
//     }

//     /**
//      * Remove a product from the specified order.
//      */
//     public function removeProduct($orderId, $productId)
//     {
//         $order = Order::find($orderId);

//         if (!$order) {
//             return response()->json(['message' => 'Order not found'], 404);
//         }

//         $product = Product::find($productId);
//         if (!$product) {
//             return response()->json(['message' => 'Product not found'], 404);
//         }

//         $order->products()->detach($product);

//         return response()->json(['message' => 'Product removed from order successfully']);
//     }
// }

