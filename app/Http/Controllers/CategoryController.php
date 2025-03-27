<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:categories,slug',
            'description' => 'required|string',
            'image'       => 'required|url',
            'created_by'  => 'required|integer|exists:users,id',
        ]);
        $category = Category::create($validated);

        //
       // dd($request->all());

//        $category = new Category();
//        $category->name = $request->name;
//        $category->description = $request->description;
//        $category->save();  // first way
//        Category::create([
//            'name' => $request->name,
//            'description' => $request->description
//        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'required|string',
            'image'       => 'required|url',
            'created_by'  => 'required|integer|exists:users,id',
        ]);
        $category->update($validated);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         $category->delete(); // soft delete
       // $category->forceDelete(); // delete permanently
        // $category->trashed(); // check if deleted
        // $category->restore(); // restore deleted


        return redirect()->route('categories.index');
    }
}
