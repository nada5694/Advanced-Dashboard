<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = Product::with('category')->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $products   = Product::all();
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|unique:products,name|max:255',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'discount'    => 'nullable|integer'
        ]);

        $product              = new Product();
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->discount    = $request->discount;
        $product->save();

        return redirect()->route('products.index')->with('success', "Product \"{$product->name}\" has been created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::findOrFail($id);
        return redirect()->route('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->user_type == 'admin' || $product->create_user_id == auth()->user()->id) {
            $product    = Product::findOrFail($id);
            $categories = Category::all();
            return view('dashboard.products.edit', compact('product', 'categories'));
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // if(isUserAuthorizedToCreateProduct()){
        //     $request->validate([
        //         'name'                 => 'required|string|unique:products,name|max:255'
        //     ]);
        // }
        $request->validate([
            // 'name'                 => 'required|string|unique:products,name|max:255',
            'price'                => 'required|numeric',
            'description'          => 'nullable|string',
            'quantity'             => 'required|integer|min:0',
            'category_id'          => 'nullable|exists:categories,id',
            'discount'             => 'nullable|integer|max:100'
        ]);

        $product                    = Product::findOrFail($id);
        $product->name              = $request->name;
        $product->description       = $request->description;
        $product->category_id       = $request->category_id;
        $product->quantity          = $request->quantity;
        $product->price             = $request->price;
        $product->discount          = $request->discount;
        $product->save();
        return redirect()->route('products.index')->with('Success', "\"$product->name\" has been updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        try {
            $product->delete();
            return redirect()->route('products.index')->with('Success', '"'.$product->name .'"\'s Product has been deleted successfully.');
        }catch (\Exception $exception) {
            return redirect()->route('products.index')->with('error', 'Something went wrong!');
        }
    }
}
