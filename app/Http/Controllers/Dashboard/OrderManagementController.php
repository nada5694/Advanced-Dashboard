<?php

// namespace App\Http\Controllers\Dashboard;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class OrderManagementController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }


// namespace App\Http\Controllers\Dashboard;

// use App\Http\Controllers\Controller;
// use App\Models\Order;
// use App\Models\Product;
// use App\Models\OrderProduct;
// use Illuminate\Http\Request;
// // use Illuminate\Support\Facades\DB;


// class OrderManagementController extends Controller
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
