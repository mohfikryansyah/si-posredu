<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
        // dd($request->all());
        $validatedData = $request->validateWithBag('add_post', [
            'title' => 'required|max:255|unique:posts,title',
            'category_id' => 'required',
            'body' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        $validatedData['slug'] = Str::of($request->title)->slug('-');

        // Jika gambar valid, simpan file-nya
        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $imagePath;
        }

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
        $validatedData = $request->validateWithBag('edit_post', [
            'title' => 'required|max:255|unique:posts,title,' . $post->id, // Abaikan validasi unik untuk post yang sedang diupdate
            'category_id' => 'required',
            'body' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar tidak wajib, hanya jika ada
        ]);

        // Generate slug baru jika title berubah
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        // Cek apakah gambar baru diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            // Simpan gambar baru
            $imagePath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $imagePath;
        }

        // Update data post
        Post::where('id', $post->id)->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Data berhasil diperbarui!');
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
