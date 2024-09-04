<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Post.index', [
            'posts' => Post::with('category')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Post.create', [
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('add_post', [
            'title' => 'required|max:255|unique:posts,title',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        $validatedData['slug'] = Str::of($request->title)->slug('-');

        Post::create($validatedData);
        return redirect()->route('posts.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $post = Post::with('category')->where('slug', $post)->first();
        return view('Post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        return view('Post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $validatedData = $request->validateWithBag('edit_post', [
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'category_id' => 'required',
            'body' => 'required',
        ]);

        $validatedData['slug'] = Str::of($request->title)->slug('-');

        Post::where('id', $post->id)->update($validatedData);
        return redirect()->route('posts.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Post::findOrFail($request->id)->delete();
        return redirect()->route('posts.index')->with('success', 'Data berhasil dihapus!');
    }
}
