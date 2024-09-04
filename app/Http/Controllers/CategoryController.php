<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('Category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('add_category', [
            'title' => 'required|max:255|unique:categories,title',
        ]);

        $validatedData['slug'] = Str::of($request->title)->slug('-');

        Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category);
        $categories = Category::latest()->get();
        return view('Category.edit', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validateWithBag('edit_category', [
            'title' => 'required|max:255|unique:categories,title',
        ]);

        $validatedData['slug'] = Str::of($request->title)->slug('-');

        Category::where('id', $category->id)->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::findOrFail($request->id)->delete();
        return redirect()->route('categories.index')->with('success', 'Data berhasil dihapus!');
    }
}
