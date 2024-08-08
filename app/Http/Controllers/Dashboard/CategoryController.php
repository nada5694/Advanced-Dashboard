<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        // $categories = Category::whereNull('category_parent_id')->get(); // To show the main categories only without the sub-categories
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'               => 'required|string|unique:categories,name|max:255',
            'description'        => 'nullable|string|max:510',
            'category_parent_id' => 'nullable|exists:categories,id',
        ]);

        $category                     = new Category();
        $category->name               = $request->name;
        $category->description        = $request->description;
        $category->category_parent_id = $request->category_parent_id;
        $category->save();
        return redirect()->route('categories.index')->with('success', "\"$category->name\" has been created successfully.");
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        // if(auth()->user()->user_type == "admin"){
        //     $category   = Category::findOrFail($id);
        //     $categories = Category::all();
        //     // $categories = Category::whereNull('category_parent_id')->get(); // To show the main categories only without the sub-categories
        //     return view('dashboard.categories.edit', compact('category', 'categories'));
        // }
        // return abort(403);

        if(auth()->user()->user_type == "admin"){
            $category   = Category::findOrFail($id);
            $categories = Category::all();
            // $categories = Category::whereNull('category_parent_id')->get(); // To show the main categories only without the sub-categories
            return view('dashboard.categories.edit', compact('category', 'categories'));
        } else{
            $category   = Category::where('create_user_id', auth()->user()->id)->findOrFail($id);
            $categories = Category::all();
            // $categories = Category::whereNull('category_parent_id')->get(); // To show the main categories only without the sub-categories
            return view('dashboard.categories.edit', compact('category', 'categories'));
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'               => 'required|string|max:255|unique:categories,name,'.$id,
            'description'        => 'nullable|string|max:510',
            'category_parent_id' => 'nullable|exists:categories,id',
        ]);

        $category                     = Category::findOrFail($id);
        $category->name               = $request->name;
        $category->description        = $request->description;
        $category->category_parent_id = $request->category_parent_id;
        $category->save();
        return redirect()->route('categories.index')->with('success', "\"$category->name\" has been updated successfully.");
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', '"'. $category->name .'"\'s category has been deleted successfully.');
        } catch (\Exception $exception) {
            return redirect()->route('categories.index')->with('error', 'Something went wrong!');
        }
    }
}
